import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Date;
public class Emprunt {
    private int idEmprunt;
    private Date dateEmprunt;
    private Date dateRetour;
    private Livre livre;
    private Membre membre;

    // Getters et Setters

    public int getIdEmprunt() {
        return idEmprunt;
    }

    public void setIdEmprunt(int idEmprunt) {
        this.idEmprunt = idEmprunt;
    }

    public Date getDateEmprunt() {
        return dateEmprunt;
    }

    public void setDateEmprunt(Date dateEmprunt) {
        this.dateEmprunt = dateEmprunt;
    }

    public Date getDateRetour() {
        return dateRetour;
    }

    public void setDateRetour(Date dateRetour) {
        this.dateRetour = dateRetour;
    }

    public Livre getLivre() {
        return livre;
    }

    public void setLivre(Livre livre) {
        this.livre = livre;
    }

    public Membre getMembre() {
        return membre;
    }

    public void setMembre(Membre membre) {
        this.membre = membre;
    }

    // Méthode pour enregistrer un emprunt dans la base de données
    public void enregistrerEmprunt(Connection connection) throws SQLException {
        String query = "INSERT INTO Emprunt (dateEmprunt, dateRetour, idLivre, idMembre) VALUES (?, ?, ?, ?)";
        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setDate(1, new java.sql.Date(dateEmprunt.getTime()));  // Convertir Date en java.sql.Date
            statement.setDate(2, new java.sql.Date(dateRetour.getTime()));  // Convertir Date en java.sql.Date
            statement.setInt(3, livre.getIdLivre());
            statement.setInt(4, membre.getIdMembre());
            statement.executeUpdate();
        }
    }

    // Méthode pour retourner un livre et enregistrer la date de retour
    public void retournerLivre(Connection connection) throws SQLException {
        String query = "UPDATE Emprunt SET dateRetour = ? WHERE idEmprunt = ?";
        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setDate(1, new java.sql.Date(new Date().getTime()));  // Date actuelle
            statement.setInt(2, idEmprunt);
            statement.executeUpdate();
        }
    }

    // Méthode pour prolonger la date de retour d'un emprunt
    public void prolongerEmprunt(Connection connection, Date nouvelleDateRetour) throws SQLException {
        String query = "UPDATE Emprunt SET dateRetour = ? WHERE idEmprunt = ?";
        try (PreparedStatement statement = connection.prepareStatement(query)) {
            statement.setDate(1, new java.sql.Date(nouvelleDateRetour.getTime()));  // Nouvelle date de retour
            statement.setInt(2, idEmprunt);
            statement.executeUpdate();
        }
    }

    // Méthode pour afficher les emprunts en cours
    public static List<Emprunt> afficherEmpruntsEnCours(Connection connection) throws SQLException {
        List<Emprunt> empruntsEnCours = new ArrayList<>();
        String query = "SELECT * FROM Emprunt WHERE dateRetour IS NULL"; // Emprunts non retournés
        try (Statement statement = connection.createStatement();
             ResultSet resultSet = statement.executeQuery(query)) {

            while (resultSet.next()) {
                Emprunt emprunt = new Emprunt();
                emprunt.setIdEmprunt(resultSet.getInt("idEmprunt"));
                emprunt.setDateEmprunt(resultSet.getDate("dateEmprunt"));
                emprunt.setDateRetour(resultSet.getDate("dateRetour"));

                // Charger le livre associé
                int idLivre = resultSet.getInt("idLivre");
                Livre livre = new Livre();
                livre.setIdLivre(idLivre);
                emprunt.setLivre(livre);

                // Charger le membre associé
                int idMembre = resultSet.getInt("idMembre");
                Membre membre = new Membre();
                membre.setIdMembre(idMembre);
                emprunt.setMembre(membre);

                empruntsEnCours.add(emprunt);
            }
        }
        return empruntsEnCours;
    }
}
