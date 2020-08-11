import mysql.connector #Connexion avec la bdd & Manipulation avec mysql
from mysql.connector import errorcode
import csv #Manipulation des fichiers csv
import sys #Arguments
 

#Connexion à la base de données

try:
    bdd = mysql.connector.connect(
            host="localhost",
            user="utilisateur",
            password="m0t_d3_p@sse_us3r",
            database="delinquance"
            )
except mysql.connector.Error as err:
    print("Error occured (BDD Connexion) : {}".format(err))

#---------------------------------------

cursor = bdd.cursor(buffered = True) #Création du curseur

#Si les tables existent, on les supprime

cursor.execute("ALTER TABLE Crime DROP FOREIGN KEY Crime_ibfk_1;")
cursor.execute("ALTER TABLE Ville DROP FOREIGN KEY Ville_ibfk_1;")
cursor.execute("ALTER TABLE Departement DROP FOREIGN KEY Departement_ibfk_1;")
cursor.execute("DROP TABLE IF EXISTS Institution;")
cursor.execute("DROP TABLE IF EXISTS Crime;")
cursor.execute("DROP TABLE IF EXISTS Ville;")
cursor.execute("DROP TABLE IF EXISTS Departement;")
cursor.execute("DROP TABLE IF EXISTS Region;")

bdd.commit()
#-----------------------------------------

#Créations des tables de la base de donnée

cursor.execute("CREATE TABLE IF NOT EXISTS Institution (ID_Institution INT AUTO_INCREMENT PRIMARY KEY NOT NULL, Institution CHAR(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;") #Création de la table Institution

cursor.execute("CREATE TABLE IF NOT EXISTS Crime (ID_Crime INT AUTO_INCREMENT PRIMARY KEY, ID_Institution INT, Crime TEXT NOT NULL, Annee YEAR NOT NULL, Nb_Actes int(10) DEFAULT '0' NOT NULL, LocalisationX DECIMAL(7,5) DEFAULT NULL, LocalisationY DECIMAL(7,5) DEFAULT NULL, CONSTRAINT Crime_ibfk_1 FOREIGN KEY(ID_Institution) REFERENCES Institution(ID_Institution)) ENGINE=InnoDB DEFAULT CHARSET=utf8;") #Création de la table Institution

cursor.execute("CREATE TABLE IF NOT EXISTS Region (ID_Region INT AUTO_INCREMENT PRIMARY KEY NOT NULL, Region CHAR(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;") #Création de la table Région

cursor.execute("CREATE TABLE IF NOT EXISTS Departement (ID_Departement INT AUTO_INCREMENT PRIMARY KEY NOT NULL, ID_Region INT NOT NULL, Departement CHAR(50) NOT NULL, Num_Departement INT(10) NOT NULL, CONSTRAINT Departement_ibfk_1 FOREIGN KEY(ID_Region) REFERENCES Region(ID_Region)) ENGINE=InnoDB DEFAULT CHARSET=utf8;") #Création de la table Département

cursor.execute("CREATE TABLE IF NOT EXISTS Ville (ID_Ville INT AUTO_INCREMENT PRIMARY KEY NOT NULL, ID_Departement INT NOT NULL, Ville CHAR(50) NOT NULL, FOREIGN KEY(ID_Departement) REFERENCES Departement(ID_Departement)) ENGINE=InnoDB DEFAULT CHARSET=utf8;") #Création de la table Ville

#----------------------------------------------------------------

#Ouverture du fichier csv en premier argument
f = open(sys.argv[1], mode='r') #Ouverture du fichier en argument
reader = csv.reader(f, delimiter=',')
next(reader, None) #Permet de lire le csv sans la première ligne qui contient les titres

#-----------------------

#Définition des requêtes d'insertion

req0 = "INSERT INTO Institution (Institution) VALUES (%s)"
req1 = "INSERT INTO Crime (Crime, ID_Institution, Nb_Actes, Annee, LocalisationX, LocalisationY) VALUES (%s, %s, %s, %s, %s, %s)"
req2 = "INSERT INTO Region (Region) VALUES (%s)"
req3 = "INSERT INTO Departement (Num_Departement, Departement, ID_Region) VALUES (%s, %s, %s)"
req4 = "INSERT INTO Ville (Ville, ID_Departement) VALUES (%s, %s)"

#---------------------------------------------

#Insertion des données dans la base de données

print("\nExportation des données, veuillez patienter quelques secondes ...")

print("\n...\n")
for row in reader:

    #Creation des tuples pour exécuter des requêtes contenant les données du csv
    tuple0 = row[0] #Institution
    tuple1 = row[1] #Annee
    tuple2 = row[2] #Crime
    tuple3 = row[3] #Nb_Actes
    tuple4 = row[4] #Num_Departement
    tuple5 = row[5] #Ville
    tuple6 = row[6] #Region
    tuple7 = row[7] #Departement
    tuple8 = row[8] #LocalisationX
    tuple9 = row[9] #LocalisationY
    #------------------------------

    #---- Colonne Institution ----#
    ID_Institution = 0
    
    sql0 = "SELECT ID_Institution FROM Institution WHERE Institution = (%s)"
    cursor.execute(sql0, (tuple0,)) #Exécution de la requête sql0 : Récupération de l'ID (S'il existe)
    res0 = cursor.fetchall() #Récupération

    if len(res0) == 0: #Si l'institution n'existe pas, on l'ajoute à la base de données
        cursor.execute(req0, (tuple0,)) #Execution de la requête req0 : Insertion de l'institution dans la bdd
        bdd.commit()

    cursor.execute(sql0, (tuple0,))
    for x in cursor.fetchall():
        ID_Institution = x[0]

    #------------------------

    #---- Relatif à la table du crime ----#
    
    ID_Crime = 0
    
    sql1 = "SELECT ID_Crime FROM Crime WHERE Crime = (%s) AND ID_Institution = (%s) AND Nb_Actes = (%s) AND Annee = (%s) AND LocalisationX = (%s) AND LocalisationY = (%s)"
    Crime_values = (tuple2, ID_Institution, row[3], row[1], row[8], row[9])

    cursor.execute(sql1, Crime_values) #Exécution de la requête sql1 : Recherche des ID des crimes existant avec les données demandées
    res1 = cursor.fetchall() #Récupération des données sur des crimes déjà répertoriés
    
    if len(res1) == 0: #Si le crime n'est pas répertorié dans la bdd, on l'y ajoute
        cursor.execute(req1, Crime_values) #Exécution de la requête req1 : Insertion des données relatives à la table du crime
                                           #Crime - ID_Institution - Nb_Actes - Annee - LocalisationX - LocalisationY
        bdd.commit()

    #Si le crime existe déjà dans la bdd
    cursor.execute(sql1, Crime_values)
    for x in cursor.fetchall():
        ID_Crime = x[0]
        bdd.commit()
    #-------------------------

    #---- Colonne Région ----#
    ID_Region = 0
    
    sql2 = "SELECT ID_Region FROM Region WHERE Region = (%s)"

    cursor.execute(sql2, (tuple6,)) #Exécution de la requête sql2 : Récupération des ID des régions (Si répertoriées)
    res2 = cursor.fetchall() #Récupération des ID des régions dans un tableau

    if len(res2) == 0: #Si la région n'est pas répertoriée dans la bdd, on l'y ajoute
        cursor.execute(req2, (tuple6,)) #Execution de la requête req2 : Insertion de la région dans la bdd
        bdd.commit()

    #Si elle est déjà répertoriée, on la réfère à l'ID existant
    cursor.execute(sql2, (tuple6,))
    for x in cursor.fetchall():
        ID_Region = x[0]
        bdd.commit()

    #---- Colonne Departement & Num_Departement ----#
    ID_Departement = 0
    
    sql3 = "SELECT ID_Departement FROM Departement WHERE Num_Departement = (%s) OR Departement = (%s)"
    cursor.execute(sql3, (tuple4, tuple7)) #Exécution de la requête sql3 : Récupération des ID des départements (Si répertoriées)
    res3 = cursor.fetchall() #Récupération des ID des départements dans un tableau

    if len(res3) == 0: #Si le département n'est pas répertoriée dans la bdd, on l'y ajoute
        cursor.execute(req3, (tuple4, tuple7, ID_Region)) #Execution de la requête req3 : Insertion du num_département dans la bdd
        bdd.commit()

    #Si le département a déjà été rentré, on le réfère à son ID 
    cursor.execute(sql3, (tuple4, tuple7))
    for x in cursor.fetchall():
        ID_Departement = x[0]
        bdd.commit()

    #---- Colonne Ville ----#
    ID_Ville = 0
    
    sql4 = "SELECT ID_Ville FROM Ville WHERE Ville = (%s)"
    cursor.execute(sql4, (tuple5,)) #Exécution de la requête sql4 : Récupération des ID des villes (Si répertoriées)
    res4 = cursor.fetchall() #Récupération des ID des villes dans un tableau

    if len(res4) == 0: #Si la ville n'est pas répertoriée dans la bdd, on l'y ajoute
        cursor.execute(req4, (tuple5, ID_Departement)) #Execution de la requête req4 : Insertion de la ville dans la bdd (en fonction de l'ID du département correspondant)
        bdd.commit()

    #Si la ville existe déjà, on la réfère à son ID
    cursor.execute(sql4, (tuple5,))
    for x in cursor.fetchall():
        ID_Ville = x[0]
        bdd.commit()

    bdd.commit() #Commit de la bdd : validation de la requête

print ("\nCSV file imported to database\n\n")

print ("\n...\nCréation des triggers :\n\n")

#Reset des Trigger
cursor.execute("DROP TRIGGER IF EXISTS before_delete_Region")
cursor.execute("DROP TRIGGER IF EXISTS before_delete_Departement")
cursor.execute("DROP TRIGGER IF EXISTS before_delete_Institution")

bdd.commit()

#Création trigger après suppressions des clés étrangères, supprime les données liées aux tables liées par les références
req = ("CREATE TRIGGER before_delete_Region BEFORE DELETE ON Region FOR EACH ROW DELETE FROM Departement WHERE Departement.ID_Region = OLD.ID_Region;")
cursor.execute(req)
print("Trigger before_delete_Region crée")

req = ("CREATE TRIGGER before_delete_Departement BEFORE DELETE ON Departement FOR EACH ROW DELETE FROM Ville WHERE Ville.ID_Departement = OLD.ID_Departement;")
cursor.execute(req)
print("Trigger before_delete_Departement crée")

req = ("CREATE TRIGGER before_delete_Institution BEFORE DELETE ON Institution FOR EACH ROW DELETE FROM Crime WHERE Crime.ID_Institution = OLD.ID_Institution;")
cursor.execute(req)
print("Trigger before_delete_Institution crée")

bdd.commit()
#-------------------------------------
#Création procédure stockée (permet de récupérer le nombre de crime par an [Ici 2014])
req = "DROP PROCEDURE IF EXISTS Nb_Crimes_Par_An"
cursor.execute(req)
bdd.commit()

#Creation du SP (stored procedure)
createSP = "CREATE PROCEDURE Nb_Crimes_Par_An(IN p_Annee YEAR) SELECT SUM(Nb_Actes) FROM Crime WHERE Annee = p_Annee;"

cursor.execute(createSP)
bdd.commit()
print("\n\nStored procedure Nb_Crimes_Par_An created : Get number of crimes per year\n")

cursor.execute("CALL Nb_Crimes_Par_An(2014);", multi=True)

crimes = cursor.fetchone()
print ("Le nombre de crime en 2014 est de ", crimes[0])

#------------------------------------

#Connexion à la base de donnée fermée.
cursor.close()
bdd.close()

#Fin du script

