<?php
class User {
    private string $name;
    private string $email;
    private string $password;
    private string $membre;
    private string $prenom;

    // Constructor to initialize user details
    public function __construct(string $name,string $prenom, string $email, string $password, string $membre) {
        $this->name = $name;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Encrypt password
        $this->membre = $membre;
    }

    // Get User Name
    public function getName(): string {
        return $this->name;
    }
    // Get User Name
    public function getPrenom(): string {
        return $this->prenom;
    }

    // Get User Email
    public function getEmail(): string {
        return $this->email;
    }

    // Get User membre
    public function getMembre(): string {
        return $this->membre;
    }

      // Get User password
      public function getPassword(): string {
        return $this->password;
    }

    // Check Password
    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    // Check if user has a specific membre
    public function hasmembre(string $membre): bool {
        return $this->membre === $membre;
    }
}
?>