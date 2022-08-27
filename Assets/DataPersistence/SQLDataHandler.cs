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

        myConnectionString = "server=localhost;uid=sail;pwd=password;database=laravel";

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


    //    /*
    //    get user from mysql, with a 1s timeout otherwise it returns null
    //*/
    //    public GameData Load_old()
    //    {
    //        GameData loadedData = null;

    //        SqlConnectionStringBuilder builder = new SqlConnectionStringBuilder();
    //        builder.DataSource = this.dataSource;           // "<sql server address>";
    //        builder.UserID = this.userId;                   // "<login>";
    //        builder.Password = this.password;               // "<password>";
    //        builder.InitialCatalog = this.initialCatalog;   // "<databases>";

    //        try
    //        {
    //            // connect to the databases
    //            using (SqlConnection connection = new SqlConnection(builder.ConnectionString))
    //            {
    //                // if open then the connection is established
    //                connection.Open();
    //                Debug.Log("connection established");
    //                // sql command
    //                /*string sql = "SELECT MAX(u.[Name]), " +
    //                    "MAX(u.[AboutMe]), " +
    //                    "MAX(u.[UserPrincipalName]), " +
    //                    "string_agg(s.[Name], ', '), " +
    //                    "u.Id FROM [dbo].[Users] u " +
    //                    "inner join [dbo].[UserSkills] us " +
    //                    "on us.UserId = u.Id " +
    //                    "inner join [dbo].[Skills] s " +
    //                    "on us.SkillId = s.Id " +
    //                    "group by u.Id";*/
    //                string sql = "SELECT * FROM USERS";
    //                // execute sql command
    //                using (SqlCommand command = new SqlCommand(sql, connection))
    //                {
    //                    // read
    //                    using (SqlDataReader reader = command.ExecuteReader())
    //                    {
    //                        // each line in the output
    //                        while (reader.Read())
    //                        {
    //                            // to avoid SqlNullValueException
    //                            if (!reader.IsDBNull(0)
    //                                                   & !reader.IsDBNull(1)
    //                                                   & !reader.IsDBNull(3))
    //                            {
    //                                Debug.Log("found gamedata matching requests:");
    //                                string username = reader.GetString(0);

    //                                /*
    //                                // Skills list to be attached to each user object
    //                                List<Skill> skills = new List<Skill>();
    //                                // get output parameters
    //                                string username = reader.GetString(0);
    //                                string aboutString = reader.GetString(1);
    //                                string skillsString = reader.GetString(3);
    //                                // as we are getting a list of skills as 
    //                                // a single string delimited by comma
    //                                // we split the string
    //                                string[] skillsList = skillsString.Split(',');
    //                                // we now iterate through each skill to initialize our
    //                                // skill object and put it into skills list
    //                                foreach (string skillName in skillsList)
    //                                {
    //                                    // initialize a skill object with a trimmed string
    //                                    Skill skill = new Skill(skillName.Trim());
    //                                    // append to the skills array
    //                                    skills.Add(skill);
    //                                }
    //                                // initialize User oobject
    //                                User user = new User(username.Trim(), aboutString.Trim(), skills);
    //                                users.Add(user);
    //                                */
    //                            }
    //                        }
    //                    }
    //                }
    //            }
    //        }
    //        catch (SqlException e)
    //        {
    //            Debug.LogWarning(e.ToString());
    //        }

    //        return loadedData;
    //    }

    //    public GameData Load2()
    //    {
    //        GameData gameData = null;

    //        string connectionString =
    //           $"Server={this.dataSource};" +
    //           $"Database={this.initialCatalog};" +
    //           $"User ID={this.userId};" +
    //           $"Password={this.password};";

    //        try
    //        {
    //            IDbConnection dbcon = new SqlConnection(connectionString);

    //            dbcon.Open();
    //            IDbCommand dbcmd = dbcon.CreateCommand();
    //            string sql = "SELECT fname, lname " + "FROM employee";
    //            dbcmd.CommandText = sql;
    //            IDataReader reader = dbcmd.ExecuteReader();
    //            while (reader.Read())
    //            {
    //                string FirstName = (string)reader["fname"];
    //                string LastName = (string)reader["lname"];
    //                Debug.Log("Name: " +  FirstName + " " + LastName);
    //            }

    //            // clean up
    //            reader.Close();
    //            reader = null;
    //            dbcmd.Dispose();
    //            dbcmd = null;
    //            dbcon.Close();
    //            dbcon = null;
    //        }
    //        catch (SqlException e)
    //        {
    //            Debug.LogWarning(e.ToString());
    //        }      

    //        return gameData;
    //    }

}
