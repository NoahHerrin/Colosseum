# Colosseum
Description of Problem: Colosseum is a companion application and platform for live action player versus player games. Player versus Player games like capture the flag, or Nerf Wars often face difficulty with communication, Confusion of the rules, or the ever present effects of human error and bias.

Components of the Project
  + User Network
    Description: A Social Network similar to steam. User Profile's will store records of passed games, friends, active and past games, and a simple bio. Requires a authentication system and a database for user data.

  + Companion App
    Description: App and Website. A User will be able to create a match using various settings that modify the gameplay. This user will be the admin and will have special powers to modify the game's settings (several abilities might be revoked during actual gameplay). Companion Application will generate a code the admin can physically distribute to another user, or they will have the option to invite another user to a game via the User Network. Once the game is in progress the Companion app system will keep track of who is still in the game (not out, tagged, or "dead"). There are added communication's features such as callouts, GPS locating, and Teams. The game will continue until there is one user or team remaining. In the case of the team the admin will be able to decide again if they would like to have a lightning round, where the team is forced to split up and compete against each other, ensuring a single victor. Each participant in the Match will receive a notification with details of the match, and their profile statistics will be updated.

Details of each Object Type:
  + User
    - email
    - username
    - password
    - friends list
    - statistics
      * Total Matches
      * Total [kills / outs]
      * Total Solo Wins
      * Total Team Wins
      * Kill to Death Ratio
      * Total Revives

  + Match
    - participants
      * user id (linked to a user account)
      * team id
      * list of user id's that participant has tagged or "killed"
      * alive status
      * location (GPS or relative)
    - teams (optional)
      * team name (default team one, two, etc..)
      * team id
      * list of user id's
      * list of team communications
      * team's revive
    - communications
      * GPS callouts (group up on me/ meet here)
      * x participant is dead/ x participant has killed participant y
    - game mode idea's
      * pubg shrinking match radius
      * revive via going to specific location

User Experience's:
  + User Network:
    1. Open Website, or App
    2. Prompted to Signin or Signup
    3. Create Account with email, username, and password




    -
