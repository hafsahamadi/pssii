import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class Livre {
    private int idLivre;
    private String titre;
    private String auteur;
    private String categorie;

    // Constructeurs
    public Livre(String titre, String auteur, String categorie) {
        this.titre = titre;
        this.auteur = auteur;
        this.categorie = categorie;
    }
    public Livre(){};
    public Livre(int idLivre, String titre, String auteur, String categorie) {
        this.idLivre = idLivre;
        this.titre = titre;
        this.auteur = auteur;
        this.categorie = categorie;
    }

    // Getters et Setters

    public int getIdLivre() {
        return idLivre;
    }

    public void setIdLivre(int idLivre) {
        this.idLivre = idLivre;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getAuteur() {
        return auteur;
    }

    public void setAuteur(String auteur) {
        this.auteur = auteur;
    }

    public String getCategorie() {
        return categorie;
    }

    public void setCategorie(String categorie) {
        this.categorie = categorie;
    }

    // Méthodes pour gérer les livres dans la base de données

    // Ajouter un livre dans la base de données
    public void ajouterLivre() {
        String query = "INSERT INTO Livre (titre, auteur, categorie) VALUES (?, ?, ?)";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setString(1, this.titre);
            stmt.setString(2, this.auteur);
            stmt.setString(3, this.categorie);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Modifier les informations d'un livre existant
    public void modifierLivre() {
        String query = "UPDATE Livre SET titre = ?, auteur = ?, categorie = ? WHERE idLivre = ?";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setString(1, this.titre);
            stmt.setString(2, this.auteur);
            stmt.setString(3, this.categorie);
            stmt.setInt(4, this.idLivre);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Supprimer un livre de la base de données
    public static void supprimerLivre(int idLivre) {
        String query = "DELETE FROM Livre WHERE idLivre = ?";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setInt(1, idLivre);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Méthode pour afficher tous les livres
    public static List<Livre> afficherLivres() {
        List<Livre> livres = new ArrayList<>();
        String query = "SELECT * FROM Livre";
        try (Connection connection = DBConnection.getConnection();
             Statement stmt = connection.createStatement();
             ResultSet rs = stmt.executeQuery(query)) {
            while (rs.next()) {
                livres.add(new Livre(
                        rs.getInt("idLivre"),
                        rs.getString("titre"),
                        rs.getString("auteur"),
                        rs.getString("categorie")
                ));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return livres;
    }
}
