<?php

class StatusRepository extends DbRepository
{
	public function insert($user_id, $body)
	{
		$now = new DateTime();

		$sql = "INSERT INTO status(user_id, body, created_at) VALUES(:user_id, :body, :created_at)";

		$stmt = $this->execute($sql, array(
			':user_id' => $user_id,
			':body' => $body,
			':created_at' => $now->format('Y-m-d H:i:s'),
		));
	}

	public function fetchAllPersonalArchivesByUserId($user_id)
	{
		$sql = "SELECT a.*, u.user_name FROM status a LEFT JOIN user u ON a.user_id = u.id WHERE u.id = :user_id ORDER BY a.created_at DESC";

		return $this->fetchAll($sql, array(':user_id' => $user_id));
	}

	// ユーザIDに一致する投稿を全件取得するメソッド
	public function fetchAllByUserId($user_id)
	{
		$sql = "SELECT a.*, u.user_name FROM status a LEFT JOIN user u ON a.user_id = u.id WHERE u.id = :user_id ORDER BY a.created_at DESC";

		return $this->fetchAll($sql, array(':user_id' => $user_id));
	}

	// 投稿IDとユーザIDに一致するレコードを１件取得するメソッド
	public function fetchByIdAndUserName($id, $user_name)
	{
		$sql = "SELECT a.*, u.user_name FROM status a LEFT JOIN user u ON u.id = a.user_id WHERE a.id = :id AND u.user_name = :user_name";

		return $this->fetch($sql, array(
			':id' => $id,
			':user_name' => $user_name,
		));
	}

	// userアクションメソッド
	public function userAction($params)
	{
		$user = $this->db_manager->get('User')->fetchByUserName($params['user_name']);
		if (!$user) {
			$this->forward404();
		}

		$statuses = $this->db_manager->get('Status')->fetchAllByUserId($user['id']);

		return $this->render(array(
			'user' => $user,
			'statuses' => $statuses,
		));
	}
}
