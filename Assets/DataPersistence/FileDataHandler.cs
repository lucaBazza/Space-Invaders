using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using System;
using System.IO;

public class FileDataHandler
{
    private string dataDirPath = "";

    private string dataFileName = "";

    private bool useEncryption = false;

    private readonly string encryptionCodeWord = SystemInfo.deviceUniqueIdentifier;

    public FileDataHandler(string dataDirPath, string dataFileName, bool useEncryption)
    {
        this.dataDirPath = dataDirPath;
        this.dataFileName = dataFileName;
        this.useEncryption = useEncryption;
    }

    public GameData Load()
    {
        string fullPath = Path.Combine(dataDirPath, dataFileName);
        GameData loadedData = null;
        if(File.Exists(fullPath))
        {
            try
            {
                string datatoLoad = "";
                using(FileStream stream = new FileStream(fullPath, FileMode.Open))
                {
                    using(StreamReader reader = new StreamReader(stream))
                    {
                        datatoLoad = reader.ReadToEnd();
                    }
                }

                if (useEncryption)
                    datatoLoad = EncryptDecrypt(datatoLoad);

                loadedData = JsonUtility.FromJson<GameData>(datatoLoad);
            }
            catch(Exception e)
            {
                Debug.LogError($"Error occurred when trying to save data to file: {fullPath}\n{e.Message} ");
            }
        }
        return loadedData;
    }

    public void Save(GameData data)
    {
        string fullPath = Path.Combine(dataDirPath, dataFileName);

        try
        {
            Directory.CreateDirectory(Path.GetDirectoryName(fullPath));
            string dataToStore = JsonUtility.ToJson(data, true);

            if (useEncryption)
                dataToStore = EncryptDecrypt(dataToStore);

            using(FileStream stream = new FileStream(fullPath, FileMode.Create))
            {
                using (StreamWriter writer = new StreamWriter(stream))
                {
                    writer.Write(dataToStore);
                }
            }

            Debug.Log($"Saved successfully gamedatas: {fullPath}");
        }
        catch(Exception e)
        {
            Debug.LogError($"Error occurred when trying to save data to file: {fullPath}\n{e.Message} ");
        }
    }

    private string EncryptDecrypt(string data)
    {
        string modifiedData = "";

        for (int i = 0; i < data.Length; i++)
            modifiedData += (char)(data[i] ^ encryptionCodeWord[i % encryptionCodeWord.Length]);

        return modifiedData;
    }
}
