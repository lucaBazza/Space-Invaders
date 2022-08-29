using System.Collections;
using System.Collections.Generic;
using System.Threading.Tasks;
using UnityEngine;


public class SQLDataHandler
{
    private string dataSource;
    private string userId;
    private string password;
    private string initialCatalog;


    public SQLDataHandler(string serverAddress)
    {
        this.dataSource = serverAddress;
        this.userId = "sail";
        this.password = "password";
        this.initialCatalog = "laravel";
    }


    public GameData Load()
    {
        GameData loadedData = null;
        MySql.Data.MySqlClient.MySqlConnection conn;
        string myConnectionString;

        //myConnectionString = "server=localhost;uid=sail;pwd=password;database=laravel";
        myConnectionString = $"server={this.dataSource};uid={this.userId};pwd={this.password};database={this.initialCatalog}";

        try
        {
            conn = new MySql.Data.MySqlClient.MySqlConnection();
            conn.ConnectionString = myConnectionString;
            conn.Open();
            Debug.Log("open connection");
            Debug.Log($"MySQL version : {conn.ServerVersion}");

            var cmd = new MySql.Data.MySqlClient.MySqlCommand("SELECT * FROM listings;", conn);

            MySql.Data.MySqlClient.MySqlDataReader rdr = cmd.ExecuteReader();
            Debug.Log($"Field count: {rdr.FieldCount} \n");

            while (rdr.Read())
            {
                Debug.Log($"{rdr.GetString(3)} - {rdr.GetString(4)}");
            }
            
        }
        catch (MySql.Data.MySqlClient.MySqlException e)
        {
            Debug.LogWarning(e.Message);
        }

        return loadedData;
    }

    public void Save(GameData gameData)
    {
        Debug.Log("TODO");
    }

}
