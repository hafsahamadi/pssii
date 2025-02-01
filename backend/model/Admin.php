<?php
class Admin extends User {
    private array $users = [];

    public function addUser(User $user): void {
        $this->users[$user->getEmail()] = $user;
        echo "User " . $user->getEmail() . " added successfully.\n";
    }

    public function deleteUser(string $email): void {
        if (isset($this->users[$email])) {
            unset($this->users[$email]);
            echo "User " . $email . " deleted successfully.\n";
        } else {
            echo "User not found.\n";
        }
    }

    public function approveUser(string $email): void {
        if (isset($this->users[$email])) {
            echo "User " . $email . " has been approved.\n";
        } else {
            echo "User not found.\n";
        }
    }
}

?>