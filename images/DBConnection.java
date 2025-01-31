import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnection {
    public static Connection getConnection() throws SQLException {
        String url = "jdbc:mysql://localhost:3306/gestion_biblio"; // URL de la base de données
        String username = "root";  // Nom d'utilisateur MySQL
        String password = "";  // Mot de passe pour la connexion à MySQL


        return DriverManager.getConnection(url, username, password);
    }
}
