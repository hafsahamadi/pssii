import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class Membre {
    private int idMembre;
    private String nom;
    private String adresse;
    private String telephone;

    public Membre(String nom, String adresse, String telephone) {
        this.nom = nom;
        this.adresse = adresse;
        this.telephone = telephone;
    }
    public Membre() {};
    public String getNom(){
        return nom;
    }
    public int getIdMembre(){
        return idMembre;
    }
    public String getAdresse(){
        return adresse;
    }
    public void setIdMembre(int idMembre) {
        this.idMembre = idMembre;
    }
    public String getTelephone(){
        return telephone;
    }
    public static List<Membre> listerMembres() {
        List<Membre> membres = new ArrayList<>();
        String query = "SELECT * FROM Membre";
        try (Connection connection = DBConnection.getConnection();
             Statement stmt = connection.createStatement();
             ResultSet rs = stmt.executeQuery(query)) {
            while (rs.next()) {
                membres.add(new Membre(
                        rs.getString("nom"),
                        rs.getString("adresse"),
                        rs.getString("telephone")
                ));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return membres;
    }

    public void ajouterMembre() {
        String query = "INSERT INTO Membre (nom, adresse, telephone) VALUES (?, ?, ?)";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setString(1, this.nom);
            stmt.setString(2, this.adresse);
            stmt.setString(3, this.telephone);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void modifierMembre(int idMembre) {
        String query = "UPDATE Membre SET nom = ?, adresse = ?, telephone = ? WHERE idMembre = ?";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setString(1, this.nom);
            stmt.setString(2, this.adresse);
            stmt.setString(3, this.telephone);
            stmt.setInt(4, idMembre);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void supprimerMembre(int idMembre) {
        String query = "DELETE FROM Membre WHERE idMembre = ?";
        try (Connection connection = DBConnection.getConnection();
             PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setInt(1, idMembre);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
