# Space Invaders
Simple 2d implementation in Unity3D with Firebase.

![AppThumb](https://github.com/lucaBazza/SpaceInvadersExample/blob/main/Screenshots/screen3.jpeg?raw=true)


## Features  
- User profile online persisted or local
- AutoLogin feauture π¨βπΌ
- Pause menu with login information
- Statistics: bullets fired, aliens killed, average session time, kill/death ratio...
- Online ranking of π
  -  best players > higher scorecount
  -  best snipers > globally most precise
- 5 levels, each with a unique galaxy π
- increasing difficulty level by level: 
  - more enemies -health and number- π½
  - harder bosses β οΈ
  - harder ship controls π₯
  - less lifes π
  - other random surprises π

## Build

Download App MacOs x64 + Silicon [SpaceInvadersDemo.app](https://deposito.nasbazza.myds.me/SpaceInvadersDemoApp.zip)

Full working git repo: [nasbazza.myds.me/spaceinvaders.git](https://deposito.nasbazza.myds.me/SpaceInvadersExampleGit.zip)

> Check firebase sdk asset: download and import from:

`firebase_unity_sdk_9.2.0` https://firebase.google.com/support/release-notes/unity

---
## Requirements 

	β’	The score on the top left of the screen should increase of one point for each alien destroyed.
	β’	A health point should be removed for each alien passing the shipβs βhorizonβ
	β’	A health point should be removed for each collision of an alien with the ship
	β’	When the health points reach the count of zero, the game should stop and display a game over screen with the score. Users should be able to decide whether quit the game or retry.
	β’	(plus) The current game difficulty is represented by the velocity and frequency of alien spawn. You may implement a way to handle such difficulty. Starting from an easy setup, shifting toward a more challenging game.
	β’	Store in an arbitrary file information regarding user inputs and score. Other information such as the total played sessions and total played time should be stored.
	β’	(plus) Upload such data in a local database or remote database or remote system (azure, amazon S3, β¦)

---

## Screenshots

![AppThumb](https://github.com/lucaBazza/SpaceInvadersExample/blob/main/Screenshots/screen1.jpeg?raw=true)

![AppThumb](https://github.com/lucaBazza/SpaceInvadersExample/blob/main/Screenshots/screen2.jpeg?raw=true)


![AppThumb](https://github.com/lucaBazza/SpaceInvadersExample/blob/main/Screenshots/screen4.jpeg?raw=true)
