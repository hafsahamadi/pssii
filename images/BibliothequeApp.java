import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class BibliothequeApp {

    // URL de connexion à la base de données MySQL
    private static final String URL = "jdbc:mysql://localhost:3306/gestion_bibli";
    private static final String USER = "root";
    private static final String PASSWORD = "";

    public static void main(String[] args) {
        JFrame frame = new JFrame("Gestion de Bibliothèque");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(600, 400);

        JPanel panel = new JPanel();
        frame.add(panel);
        placeComponents(panel);

        frame.setVisible(true);
    }

    private static void placeComponents(JPanel panel) {
        panel.setLayout(null);

        JButton btnAjouterLivre = new JButton("Ajouter Livre");
        btnAjouterLivre.setBounds(10, 20, 150, 25);
        panel.add(btnAjouterLivre);

        JButton btnAjouterMembre = new JButton("Ajouter Membre");
        btnAjouterMembre.setBounds(10, 60, 150, 25);
        panel.add(btnAjouterMembre);

        JButton btnEnregistrerEmprunt = new JButton("Emprunter Livre");
        btnEnregistrerEmprunt.setBounds(10, 100, 150, 25);
        panel.add(btnEnregistrerEmprunt);

        JButton btnRapportEmprunt = new JButton("Rapport Emprunts");
        btnRapportEmprunt.setBounds(10, 140, 150, 25);
        panel.add(btnRapportEmprunt);

        // Actions des boutons
        btnAjouterLivre.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                JFrame ajouterLivreFrame = new JFrame("Ajouter Livre");
                ajouterLivreFrame.setSize(400, 300);
                ajouterLivreFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

                JPanel livrePanel = new JPanel();
                livrePanel.setLayout(new GridLayout(5, 2));

                JTextField titreField = new JTextField();
                JTextField auteurField = new JTextField();
                JTextField categorieField = new JTextField();

                livrePanel.add(new JLabel("Titre:"));
                livrePanel.add(titreField);
                livrePanel.add(new JLabel("Auteur:"));
                livrePanel.add(auteurField);
                livrePanel.add(new JLabel("Catégorie:"));
                livrePanel.add(categorieField);

                JButton btnAjouter = new JButton("Ajouter");
                livrePanel.add(btnAjouter);

                btnAjouter.addActionListener(new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        String titre = titreField.getText();
                        String auteur = auteurField.getText();
                        String categorie = categorieField.getText();

                        // Ajouter à la base de données
                        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
                             PreparedStatement pst = conn.prepareStatement("INSERT INTO Livre (titre, auteur, categorie) VALUES (?, ?, ?)")) {
                            pst.setString(1, titre);
                            pst.setString(2, auteur);
                            pst.setString(3, categorie);
                            pst.executeUpdate();
                            JOptionPane.showMessageDialog(null, "Livre ajouté avec succès!");
                        } catch (SQLException ex) {
                            ex.printStackTrace();
                        }
                    }
                });

                ajouterLivreFrame.add(livrePanel);
                ajouterLivreFrame.setVisible(true);
            }
        });

        btnAjouterMembre.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                JFrame ajouterMembreFrame = new JFrame("Ajouter Membre");
                ajouterMembreFrame.setSize(400, 300);
                ajouterMembreFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

                JPanel membrePanel = new JPanel();
                membrePanel.setLayout(new GridLayout(5, 2));

                JTextField nomField = new JTextField();
                JTextField adresseField = new JTextField();
                JTextField telephoneField = new JTextField();

                membrePanel.add(new JLabel("Nom:"));
                membrePanel.add(nomField);
                membrePanel.add(new JLabel("Adresse:"));
                membrePanel.add(adresseField);
                membrePanel.add(new JLabel("Téléphone:"));
                membrePanel.add(telephoneField);

                JButton btnAjouterMembre = new JButton("Ajouter");
                membrePanel.add(btnAjouterMembre);

                btnAjouterMembre.addActionListener(new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        String nom = nomField.getText();
                        String adresse = adresseField.getText();
                        String telephone = telephoneField.getText();

                        // Ajouter à la base de données
                        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
                             PreparedStatement pst = conn.prepareStatement("INSERT INTO Membre (nom, adresse, telephone) VALUES (?, ?, ?)")) {
                            pst.setString(1, nom);
                            pst.setString(2, adresse);
                            pst.setString(3, telephone);
                            pst.executeUpdate();
                            JOptionPane.showMessageDialog(null, "Membre ajouté avec succès!");
                        } catch (SQLException ex) {
                            ex.printStackTrace();
                        }
                    }
                });

                ajouterMembreFrame.add(membrePanel);
                ajouterMembreFrame.setVisible(true);
            }
        });

        btnEnregistrerEmprunt.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                JFrame empruntFrame = new JFrame("Emprunter Livre");
                empruntFrame.setSize(400, 300);
                empruntFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

                JPanel empruntPanel = new JPanel();
                empruntPanel.setLayout(new GridLayout(5, 2));

                JComboBox<String> membreComboBox = new JComboBox<>();
                JComboBox<String> livreComboBox = new JComboBox<>();
                JTextField dateEmpruntField = new JTextField();
                JTextField dateRetourField = new JTextField();

                // Remplir les comboBox avec les membres et les livres existants
                try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
                     Statement stmt = conn.createStatement()) {
                    ResultSet rsMembre = stmt.executeQuery("SELECT idMembre, nom FROM Membre");
                    while (rsMembre.next()) {
                        membreComboBox.addItem(rsMembre.getInt("idMembre") + " - " + rsMembre.getString("nom"));
                    }

                    ResultSet rsLivre = stmt.executeQuery("SELECT idLivre, titre FROM Livre");
                    while (rsLivre.next()) {
                        livreComboBox.addItem(rsLivre.getInt("idLivre") + " - " + rsLivre.getString("titre"));
                    }
                } catch (SQLException ex) {
                    ex.printStackTrace();
                }

                empruntPanel.add(new JLabel("Membre:"));
                empruntPanel.add(membreComboBox);
                empruntPanel.add(new JLabel("Livre:"));
                empruntPanel.add(livreComboBox);
                empruntPanel.add(new JLabel("Date Emprunt (yyyy-mm-dd):"));
                empruntPanel.add(dateEmpruntField);
                empruntPanel.add(new JLabel("Date Retour (yyyy-mm-dd):"));
                empruntPanel.add(dateRetourField);

                JButton btnEmprunter = new JButton("Emprunter");
                empruntPanel.add(btnEmprunter);

                btnEmprunter.addActionListener(new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        String membreSelection = (String) membreComboBox.getSelectedItem();
                        String livreSelection = (String) livreComboBox.getSelectedItem();
                        String dateEmprunt = dateEmpruntField.getText();
                        String dateRetour = dateRetourField.getText();

                        // Extraire les IDs des membre et livre
                        int idMembre = Integer.parseInt(membreSelection.split(" - ")[0]);
                        int idLivre = Integer.parseInt(livreSelection.split(" - ")[0]);

                        // Ajouter l'emprunt à la base de données
                        try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
                             PreparedStatement pst = conn.prepareStatement("INSERT INTO Emprunt (idLivre, idMembre, dateEmprunt, dateRetour) VALUES (?, ?, ?, ?)")) {
                            pst.setInt(1, idLivre);
                            pst.setInt(2, idMembre);
                            pst.setDate(3, Date.valueOf(dateEmprunt));
                            pst.setDate(4, Date.valueOf(dateRetour));
                            pst.executeUpdate();
                            JOptionPane.showMessageDialog(null, "Emprunt enregistré avec succès!");
                        } catch (SQLException ex) {
                            ex.printStackTrace();
                        }
                    }
                });

                empruntFrame.add(empruntPanel);
                empruntFrame.setVisible(true);
            }
        });

        btnRapportEmprunt.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                // Exemple de rapport des emprunts en cours (dateRetour >= date actuelle ou dateRetour NULL)
                try (Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);
                     Statement stmt = conn.createStatement()) {

                    // Récupérer la date actuelle
                    java.sql.Date currentDate = new java.sql.Date(System.currentTimeMillis());

                    // Requête pour afficher uniquement les emprunts en cours
                    String query = "SELECT E.idEmprunt, M.nom AS membre_nom, L.titre AS livre_titre, E.dateEmprunt, E.dateRetour " +
                            "FROM Emprunt E " +
                            "JOIN Membre M ON E.idMembre = M.idMembre " +
                            "JOIN Livre L ON E.idLivre = L.idLivre " +
                            "WHERE E.dateRetour >= ? OR E.dateRetour IS NULL"; // On filtre pour ne garder que les emprunts en cours

                    try (PreparedStatement pst = conn.prepareStatement(query)) {
                        pst.setDate(1, currentDate); // On passe la date actuelle pour la comparaison

                        ResultSet rs = pst.executeQuery();
                        StringBuilder rapport = new StringBuilder();

                        while (rs.next()) {
                            rapport.append("Emprunt ID: ").append(rs.getInt("idEmprunt"))
                                    .append(", Membre: ").append(rs.getString("membre_nom"))
                                    .append(", Livre: ").append(rs.getString("livre_titre"))
                                    .append(", Date Emprunt: ").append(rs.getDate("dateEmprunt"))
                                    .append(", Date Retour: ").append(rs.getDate("dateRetour") != null ? rs.getDate("dateRetour") : "Non défini")
                                    .append("\n");
                        }

                        if (rapport.length() == 0) {
                            rapport.append("Aucun emprunt en cours.");
                        }

                        JOptionPane.showMessageDialog(null, rapport.toString(), "Rapport des Emprunts en Cours", JOptionPane.INFORMATION_MESSAGE);

                    }

                } catch (SQLException ex) {
                    ex.printStackTrace();
                }
            }
    });

}
}
