<?php
class UserManager extends Manager
{
    
	public function setUser($name, $password, $email)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO users(name, password, email, sign_up_date) VALUES(:name, :password, :email, NOW())');
		$query->bindValue(':name', $name, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$affectedLines = $query->execute();
		return $affectedLines;
    }
    

	public function getUser($name)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT id, rank, password FROM users WHERE name = :name');
		$query->bindValue(':name', $name, PDO::PARAM_STR);
		$query->execute();
		$user = $query->fetch();
		return $user;
	}
}