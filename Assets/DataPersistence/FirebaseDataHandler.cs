using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using System.Threading.Tasks;

using Firebase;
using Firebase.Database;
using Firebase.Extensions;

public class FirebaseDataHandler
{
    private static string userId;

    private static DatabaseReference dbReference;

        // stringsvars > db cohesion
    private static string USER_COL = "users";
    //private static string USER_COL_NAME = "userName";
    public static string USER_COL_PRECISION = "precisionGlobal";
    public static string USER_COL_HIGHSCORE = "highestScore";

    public FirebaseDataHandler()
    {
        dbReference = FirebaseDatabase.DefaultInstance.RootReference;
        userId = SystemInfo.deviceUniqueIdentifier + "-test";
    }

    private IEnumerator queryFirebaseUser()
    {
        var userRef = dbReference.Child(USER_COL).Child(userId).GetValueAsync();
        yield return new WaitUntil(predicate: () => userRef.IsCompleted);
    }

    /*
        get user from firebase, with a 1s timeout otherwise it returns null
    */
    public async Task<GameData> Load()
    {
        const int timeout = 1000;
        GameData loadedData = null;

        var userRef = dbReference.Child(USER_COL).Child(userId).GetValueAsync();

        if (await Task.WhenAny(userRef, Task.Delay(timeout)) == userRef)
        {
            DataSnapshot snapshot = await userRef;

            if (snapshot != null && snapshot.Value != null)
            {
                loadedData = JsonUtility.FromJson<GameData>(snapshot.GetRawJsonValue());
            }
            else Debug.LogWarning("Cant load user snapshot from firebase \n Maybe is a new user?");
        }
        else Debug.LogWarning("Timeout reached waiting to complete firebaseDataHandler.Load() \n Maybe you are offline / slow internet connection?");

        return loadedData;
    }


    /*
        write or overwrite the userid of firebase
    */
    public void Save(GameData gameData, Action<string> onCallback)
    {
        dbReference.Child(USER_COL).Child(userId).SetRawJsonValueAsync(JsonUtility.ToJson(gameData));
        Debug.Log($"Firebase update user() \n {JsonUtility.ToJson(gameData)}");
        onCallback.Invoke("\t Savegame Done!");
    }

}


//public IEnumerator Load(Action<GameData> onCallback)
//{
//    GameData loadedData = null;

//    var userRef = dbReference.Child(USER_COL).Child(userId).GetValueAsync();
//    yield return new WaitUntil(predicate: () => userRef.IsCompleted);

//    if (userRef != null)
//    {
//        DataSnapshot snapshot = userRef.Result;

//        if (snapshot != null && snapshot.Value != null)
//        {
//            loadedData = JsonUtility.FromJson<GameData>(snapshot.GetRawJsonValue());

//            //onCallback.Invoke(loadedData);
//        }
//        else Debug.LogWarning("Cant load user snapshot from firebase \n Maybe is a new user?");
//    }
//    else Debug.LogWarning("Cant load firebase gamedata");

//    onCallback.Invoke(loadedData);
//}


//public async Task<GameData> LoadAsync2()
//{
//    GameData loadedData = null;

//    var userRef = dbReference.Child(USER_COL).Child(userId).GetValueAsync();
//    await Task.WhenAll(userRef);
//    //Task.Yield();

//    if (userRef != null)
//    {

//        DataSnapshot snapshot = userRef.Result;

//        if (snapshot != null && snapshot.Value != null)
//        {
//            loadedData = JsonUtility.FromJson<GameData>(snapshot.GetRawJsonValue());
//        }
//        else Debug.LogWarning("Cant load user snapshot from firebase \n Maybe is a new user?");
//    }
//    else Debug.LogWarning("Cant load firebase gamedata");

//    return loadedData;
//}
