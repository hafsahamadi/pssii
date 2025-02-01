<?php
class User {
    protected string $name;
    protected string $prenom;
    protected string $email;
    protected string $password;
    protected string $membre;

    public function __construct(string $name, string $prenom, string $email, string $password, string $membre) {
        $this->name = $name;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->membre = $membre;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }
}

?>