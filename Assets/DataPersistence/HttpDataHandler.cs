using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.Networking;
using System.Threading.Tasks;
using System;
using System.Security.Policy;
using System.Text;
using System.Text.RegularExpressions;

public class HttpDataHandler
{
    private string urlEndpoint;
    private string userId;

    public HttpDataHandler(string urlEndpoint)
    {
        this.userId = SystemInfo.deviceUniqueIdentifier;
        this.urlEndpoint = urlEndpoint + $"/{this.userId}";
    }

    public async Task<GameData>Load()
    {
        GameData loadedData = null;
        string text = null;
        UnityWebRequest req = UnityWebRequest.Get(this.urlEndpoint);
        UnityWebRequest.Result result = await req.SendWebRequest();

        Func<string, GameData> getGameDataJSON = s => {
            GameData helperLoadedData = null;
            try{ helperLoadedData = JsonUtility.FromJson<GameData>(text); }
            catch (Exception e){ Debug.LogWarning(e.Message); }
            return helperLoadedData;
        };

        if (result == UnityWebRequest.Result.Success)
        {
            if (req.responseCode == 204)
            {
                Debug.LogWarning("HTTP request: no user with this uuid, create a new gamedata \n");
            }

            else if (req.downloadHandler.text != null)
            {
                text = req.downloadHandler.text;

                loadedData = getGameDataJSON(text);

                if (loadedData ==null)
                {
                    string textClear = Regex.Replace(text, @"[^\w\d { } , : ]", String.Empty);
                    loadedData = getGameDataJSON(textClear);
                }

                if (text == null || text == "")
                {
                    Debug.LogWarning($"HTTP result {result} but no valid gamedata are loaded\n");
                }
            }            

        }
        else Debug.LogWarning($"{result}: {req.error}\n");

        return loadedData;
    }

    
    public async Task Save(GameData gameData)
    {
        Debug.Log("S A V E \n\n");

        string json = JsonUtility.ToJson(gameData, false).Replace("\\", "");

        // Assuming the laravel script manages high scores for different games
        var request = new UnityWebRequest(this.urlEndpoint, "POST");
        byte[] bodyRaw = Encoding.UTF8.GetBytes(json);
        request.uploadHandler = (UploadHandler)new UploadHandlerRaw(bodyRaw);
        request.downloadHandler = (DownloadHandler)new DownloadHandlerBuffer();
        request.SetRequestHeader("Content-Type", "application/json");

        // Wait until the download is done
        var result = await request.SendWebRequest();

        var txt = request.downloadHandler.text;

        if (result != UnityWebRequest.Result.Success)
        {
            Debug.LogWarning("Error downloading: " + result);
        }
        else
        {
            Debug.Log(request.downloadHandler.text);
        }
    }

}



/*
public async Task Save(GameData gameData)
{        
    WWWForm form = new WWWForm();

    // Assuming the laravel script manages high scores for different games
    form.AddField("userId", this.userId);
    form.AddField("json", JsonUtility.ToJson(gameData));

    // Create a download object
    var download = UnityWebRequest.Post(this.urlEndpoint, form);

    // Wait until the download is done
    await download.SendWebRequest();    //yield return download.SendWebRequest();

    if (download.result != UnityWebRequest.Result.Success)
    {
        Debug.LogWarning("Error downloading: " + download.error);
    }
    else
    {
        Debug.Log(download.downloadHandler.text);
    }
}

"[{\"id\":52,
\"uuid\":\"5BA39EF7-AA34-5435-8730-9E9C751D501C\",
\"alienKilledTotal\":0,\"bulletsFired\":0,
\"deadsPlayer\":0,
\"level\":1,
\"highestScore\":0,
\"globalPrecision\":0,
\"timePlayedTotal\":0,
\"sessionTotal\":1,
\"userName\":\"\",
\"gameDataTime\":\"2022-08-30 12:06:52\",
\"gameVersion\":\"0.1-alphatest\",
\"created_at\":\"2022-08-29T22:06:53.000000Z\",
\"updated_at\":\"2022-08-29T22:06:53.000000Z\"}]"


//string textCl = text.Replace(@"\\", string.Empty);
string textCl = Regex.Unescape(text);
//string textcll = JsonConvert.DeserializeObject<string>(text);
string asd = UnityWebRequest.UnEscapeURL(text);
string withoutQuotes = text.Trim();

var c = Encoding.UTF8.GetString(req.downloadHandler.data);

	text	"{\"5BA39EF7-AA34-5435-8730-9E9C751D501C\":{\"uuid\":\"5BA39EF7-AA34-5435-8730-9E9C751D501C\",\"alienKilledTotal\":0,\"bulletsFired\":555,\"deadsPlayer\":0,\"level\":1,\"highestScore\":999,\"globalPrecision\":0,\"timePlayedTotal\":0,\"sessionTotal\":1,\"userName\":\"Zabba\",\"gameDataTime\":\"2022-08-30 12:06:52\",\"gameVersion\":\"0.1-alphatest\"}}"	string


textfile json format
{
    "livesCount": 5,
    "playerSpeed": 0.30000001192092898,
    "alienKilledTotal": 0,
    "bulletsFired": 0,
    "deadsPlayer": 0,
    "level": 1,
    "highestScore": 0,
    "globalPrecision": 0.0,
    "timePlayedTotal": 0.0,
    "sessionTotal": 1,
    "userName": "",
    "gameDataTime": "2022-08-30 9:33:57",
    "gameVersion": "0.1"
}

*/