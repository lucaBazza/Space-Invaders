using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable]
public class GameData
{
    public int livesCount;

    public float playerSpeed;

    // Firebase
    public int alienKilledTotal;

    public int bulletsFired;

    public int deadsPlayer;

    public int level;

    public int highestScore;

    public float globalPrecision;

    public float timePlayedTotal;

    public int sessionTotal;

    public string userName;

    // Versioning
    public string gameDataTime;

    public string gameVersion;

    public GameData()
    {
        this.livesCount = 5;
        this.playerSpeed = 0.3f;

        // Firebase
        this.alienKilledTotal = 0;
        this.bulletsFired = 0;
        this.deadsPlayer = 0;
        this.level = 1;
        this.highestScore = 0;
        this.globalPrecision = 0f;
        this.timePlayedTotal = 0f;
        this.sessionTotal = 1;
        this.userName = "";

        // Versioning
        this.gameDataTime = DateTime.Now.ToString("yyyy-MM-dd h:mm:ss");
        this.gameVersion = "";
    }
}
