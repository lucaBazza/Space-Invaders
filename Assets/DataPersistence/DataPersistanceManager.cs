using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Linq;

public class DataPersistanceManager : MonoBehaviour
{
    [Header("Savegame priority order")]
    [SerializeField] private List<MonoBehaviour> saveGameOrdersTodo;

    [Header("File Storage Config")]
    [SerializeField] private string fileName;
    [SerializeField] private bool useEncryption;

    [Header("Cloud Storage Config")]
    [SerializeField] private bool useFirebase;

    [Header("SQL Storage Config")]
    [SerializeField] private bool useSQL;
    [SerializeField] private string urlEndpoint;

    [Header("HTTP Req Storage Config")]
    [SerializeField] private bool useHttpRequest;

    private GameData gameData;
    
    public static DataPersistanceManager instance { get; private set; }

    private List<IDataPersistence> dataPersistenceObjects;

    private FileDataHandler fileDataHandler;

    private FirebaseDataHandler firebaseDataHandler;

    private SQLDataHandler sqlDataHandler;

    void Awake()
    {
        if(instance != null)
            Debug.LogError("Found more than one Data Persistence Manager in the scene.");
        instance = this;
    }

    void Start()
    {
        this.fileDataHandler = new FileDataHandler(Application.persistentDataPath, fileName, useEncryption);
        this.firebaseDataHandler = new FirebaseDataHandler();
        this.sqlDataHandler = new SQLDataHandler("localhost");   // 127.0.0.1:3306
        this.dataPersistenceObjects = FindAllDataPersistenceObjects();
        LoadGame();
    }

    public void NewGame()
    {
        this.gameData = new GameData();
    }

    public async void LoadGame()
    {

        this.gameData = fileDataHandler.Load();

        if (useFirebase)
        {
            this.gameData = await firebaseDataHandler.Load();
        }

        if (useSQL)
            this.gameData = sqlDataHandler.Load();

        if(this.gameData == null)
        {
            Debug.Log("No data was fund. Initializing data to defaults.");
            NewGame();
        }

        foreach(IDataPersistence dataPersistenceObj in dataPersistenceObjects)
        {
            dataPersistenceObj.LoadData(gameData);
        }

        Debug.Log($"Loaded level count = {gameData.level}");
    }

    public void SaveGame()
    {
        foreach(IDataPersistence dataPersistenceObj in dataPersistenceObjects)
        {
            dataPersistenceObj.SaveData(gameData);
        }

        fileDataHandler.Save(gameData);

        if(useFirebase)
            firebaseDataHandler.Save(gameData, str => Debug.Log(str) );
    }

    private void OnApplicationQuit() => SaveGame();

    /*
        UTILS
    */

    // load all gameObjects that implements GameData to persist
    private List<IDataPersistence> FindAllDataPersistenceObjects()
    {
        IEnumerable<IDataPersistence> dataPersistenceObjects = FindObjectsOfType<MonoBehaviour>().OfType<IDataPersistence>();

        if( dataPersistenceObjects is null ) Debug.LogWarning("No IDataPersistence found");
    
        Debug.Log($"FindAlldataPersistenceObjects() count of game items to save: {dataPersistenceObjects.Count()} \n\n"+
                        string.Join("\n", dataPersistenceObjects.ToArray().OfType<IDataPersistence>()) +"\n\n");

        return new List<IDataPersistence>(dataPersistenceObjects);
    }

}
