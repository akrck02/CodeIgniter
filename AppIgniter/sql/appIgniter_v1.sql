/* Creating database */
DROP DATABASE IF EXISTS appIgniter;
CREATE DATABASE appIgniter;
CONNECT appIgniter;

    /* 
        Creating auth table
        -----------------------------------------------------
    */

    DROP TABLE IF EXISTS auth;
    CREATE TABLE auth (
        username varchar(255),
        mail varchar(255),
        token varchar(255),
        password varchar(255)
    );
    
    INSERT INTO auth (username,mail,token,password) VALUES ('admin','admin@appIgniter.org','A3asd8ad6asd9?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('akrck02','user@appIgniter.org','A3asd8!d$asd9?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('juan','juan@appIgniter.org','A3asd8345345d9?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('pepe','pepe@appIgniter.org','A3asd8!asdas?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('maria','maria@appIgniter.org','as232SA!d$asd9?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('carmen','carmen@appIgniter.org','A3aA%as$!d$asd9?a2AS%','root');
    INSERT INTO auth (username,mail,token,password) VALUES ('hassim','hassim@appIgniter.org','A3asd8uw$uasd9?a2AS%','root');

    /*
        Creating teams table
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS team;
    CREATE TABLE team (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(255),
        logo varchar(255),
        description varchar(255),
        PRIMARY KEY (id)
    );

    INSERT INTO team (name,logo,description) VALUES ('Nightlight Studios','NightlightStudios.png','Creating increible software!');
    INSERT INTO team (name,description) VALUES ('CoffeeOverflow','Teaching computer science ;)');

    /*
        Creating teams auth table
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS team_auth;
    CREATE TABLE team_auth (
        team int,
        auth varchar(255)
    );

    INSERT INTO team_auth (team,auth) VALUES (1,'akrck02');
    INSERT INTO team_auth (team,auth) VALUES (1,'admin');
    INSERT INTO team_auth (team,auth) VALUES (2,'akrck02');
    INSERT INTO team_auth (team,auth) VALUES (2,'juan');
    INSERT INTO team_auth (team,auth) VALUES (2,'maria');
    INSERT INTO team_auth (team,auth) VALUES (2,'pepe');

    /*
        Creating profile table
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS auth_profile;
    CREATE TABLE auth_profile (
        username varchar(255),
        profile_pic  varchar(255),
        description varchar(255),
        main_lang varchar(255)
    );

    INSERT INTO auth_profile (username,profile_pic,description,main_lang) VALUES ('admin','admin.jpg','The administrator of the world. :D','C#');
    INSERT INTO auth_profile (username,profile_pic,description,main_lang) VALUES ('juan','juan.jpg','What? Writing description is hard :(','python');
    INSERT INTO auth_profile (username,description,main_lang) VALUES ('pepe','hey there! Im using AppIgniter','php');
    INSERT INTO auth_profile (username,profile_pic,description,main_lang) VALUES ('maria','maria.jpg','Php makes me sad, anyway.','Javascript');
    INSERT INTO auth_profile (username,profile_pic,description,main_lang) VALUES ('carmen','carmen.jpg','Apps, coffee and games ;)','Go');
    INSERT INTO auth_profile (username,description,main_lang) VALUES ('hassim','Cogito ergo sum.','C++');
    INSERT INTO auth_profile (username,profile_pic,description,main_lang) VALUES ('akrck02','akrck02.png','Web developer. Cat lover. Failure? Just try again!','Java');

    /*
        Creating follow table
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS follow;
    CREATE TABLE follow (
        follower varchar(255),
        following varchar(255)
    );

    INSERT INTO follow(follower,following) VALUES('akrck02','admin');
    INSERT INTO follow(follower,following) VALUES('admin','akrck02');
    INSERT INTO follow(follower,following) VALUES('admin','juan');
    INSERT INTO follow(follower,following) VALUES('juan','akrck02');
    INSERT INTO follow(follower,following) VALUES('juan','admin');
    INSERT INTO follow(follower,following) VALUES('juan','maria');
    INSERT INTO follow(follower,following) VALUES('juan','hassim');
    INSERT INTO follow(follower,following) VALUES('pepe','akrck02');
    INSERT INTO follow(follower,following) VALUES('pepe','juan');
    INSERT INTO follow(follower,following) VALUES('maria','akrck02');
    INSERT INTO follow(follower,following) VALUES('maria','pepe');
    INSERT INTO follow(follower,following) VALUES('maria','admin');
    INSERT INTO follow(follower,following) VALUES('carmen','akrck02');
    INSERT INTO follow(follower,following) VALUES('carmen','admin');
    INSERT INTO follow(follower,following) VALUES('carmen','juan');
    INSERT INTO follow(follower,following) VALUES('hassim','akrck02');
    INSERT INTO follow(follower,following) VALUES('hassim','maria');

    /* 
        Creating repositories table 
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS repository;
    CREATE TABLE repository (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(255),
        description varchar(255),
        auth varchar(255),
        logo varchar(255),
        creation date,
        PRIMARY KEY (id)
    );

    INSERT INTO repository (name,auth,creation,description,logo) VALUES ('Bubble_UI','akrck02','2020-11-24','Modular, variable based UI design system.','Bubble_UI.png');
    INSERT INTO repository (name,auth,creation,description,logo) VALUES ('LSS_LIB','akrck02','2021-02-12','CSS generation library built in java.','LSS_LIB.png');
    INSERT INTO repository (name,auth,creation,description) VALUES ('LittleStyles','akrck02','2021-05-20','A little css minifier made in java ;)');

    /* 
        Creating repository languages table 
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS repo_lang;
    CREATE TABLE repo_lang (
        repository int,
        language varchar(255)
    );

    INSERT INTO repo_lang (repository,language) VALUES (1, 'Css');
    INSERT INTO repo_lang (repository,language) VALUES (1, 'Javascript');
    INSERT INTO repo_lang (repository,language) VALUES (1, 'Html');

    INSERT INTO repo_lang (repository,language) VALUES (2, 'Css');
    INSERT INTO repo_lang (repository,language) VALUES (2, 'Java');
    INSERT INTO repo_lang (repository,language) VALUES (2, 'python');
    INSERT INTO repo_lang (repository,language) VALUES (2, 'C#');
    INSERT INTO repo_lang (repository,language) VALUES (2, 'Javascript');

    INSERT INTO repo_lang (repository,language) VALUES (3, 'Java');

    /* 
        Creating repository commits table 
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS repo_commit;
    CREATE TABLE repo_commit (
        id int NOT NULL AUTO_INCREMENT,
        repository int,
        auth varchar(255),
        message varchar(255),
         PRIMARY KEY (id)
    );

    INSERT INTO repo_commit (repository,auth,message) VALUES (1,'akrck02','First commit! Setting up master branch.');
    INSERT INTO repo_commit (repository,auth,message) VALUES (1,'akrck02','New module - bubbleCore');

    INSERT INTO repo_commit (repository,auth,message) VALUES (2,'akrck02','LSS Core / Parser in java');
    INSERT INTO repo_commit (repository,auth,message) VALUES (2,'akrck02','LSS Client in Javascript / python / C#');
   
    INSERT INTO repo_commit (repository,auth,message) VALUES (3,'akrck02','CSS Minify in Java!');
    INSERT INTO repo_commit (repository,auth,message) VALUES (3,'akrck02','CLI service working ;)');

    /* 
        Creating commit files table 
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS commit_file;
    CREATE TABLE commit_file (
        commit int,
        file varchar(255)
    );

    INSERT INTO commit_file (commit,file) VALUES (1, 'css/master.css');
    INSERT INTO commit_file (commit,file) VALUES (2, 'css/modules/bubbleCore/core.css');
     
    INSERT INTO commit_file (commit,file) VALUES (3, 'core/LSS_LIB/src/com/akrck02/lss/lib/bean/Component.java'); 
    INSERT INTO commit_file (commit,file) VALUES (3, 'core/LSS_LIB/src/com/akrck02/lss/lib/bean/Style.java'); 
    INSERT INTO commit_file (commit,file) VALUES (3, 'core/LSS_LIB/src/com/akrck02/lss/lib/bean/Variable.java'); 
    INSERT INTO commit_file (commit,file) VALUES (3, 'core/LSS_LIB/src/com/akrck02/lss/lib/io/Parser.java'); 

    INSERT INTO commit_file (commit,file) VALUES (4, 'client/python/cli.py'); 
    INSERT INTO commit_file (commit,file) VALUES (4, 'client/javascript/cli.js'); 
    INSERT INTO commit_file (commit,file) VALUES (4, 'client/cs/cli.cs'); 

    INSERT INTO commit_file (commit,file) VALUES (5, 'littleStyles/src/com/akrck02/littlestyles/Minifier.java'); 
    INSERT INTO commit_file (commit,file) VALUES (5, 'bin/littleStyles.sh'); 

    /* 
        Creating repository releases table 
        -----------------------------------------------------
    */
    DROP TABLE IF EXISTS repo_release;
    CREATE TABLE repo_release (
        repository int,
        version varchar(255),
        binaryFile varchar(255)
    );

    INSERT INTO repo_release (repository,binaryFile,version) VALUES (1,'bubble.css','v1.0');
    INSERT INTO repo_release (repository,binaryFile,version) VALUES (3,'littleStyle.sh','v0.23');
    

    