using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.Networking;
using System.Threading.Tasks;

public class HttpDataHandler
{
    private string urlEndpoint;
    private string userId;

    public HttpDataHandler(string urlEndpoint)
    {
        this.urlEndpoint = urlEndpoint;
        this.userId = SystemInfo.deviceUniqueIdentifier;
    }

    public async Task<GameData>Load()
    {
        GameData loadedData = null;
        string text = null;
        UnityWebRequest req = UnityWebRequest.Get($"{this.urlEndpoint}?id={this.userId}");
        UnityWebRequest.Result result = await req.SendWebRequest();

        if (result == UnityWebRequest.Result.Success)
        {
            text = req.downloadHandler.text;
            loadedData = JsonUtility.FromJson<GameData>(text);
        }
        else
            Debug.LogError($"{result}: {req.error}\n");

        return loadedData;
    }

    
    public IEnumerator Save(GameData gameData)
    {
        Debug.Log("TODO");
        
        WWWForm form = new WWWForm();

        // Assuming the laravel script manages high scores for different games
        form.AddField("userId", this.userId);
        form.AddField("json", JsonUtility.ToJson(gameData));

        // Create a download object
        var download = UnityWebRequest.Post(this.urlEndpoint, form);

        // Wait until the download is done
        yield return download.SendWebRequest();

        if (download.result != UnityWebRequest.Result.Success)
        {
            Debug.LogWarning("Error downloading: " + download.error);
        }
        else
        {
            Debug.Log(download.downloadHandler.text);
        }

    }

}