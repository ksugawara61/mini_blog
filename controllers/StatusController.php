<?php

class StatusController extends Controller
{
	// 投稿を扱うindexアクションのメソッド
	public function indexAction()
	{
		$user = $this->session->get('user');
		$statuses = $this->db_manager->get('Status')
			->fetchAllPersonalArchivesByUserId($user['id']);

		return $this->render(array(
			'statuses' => $statuses,
			'body' => '',
			'_token' => $this->generateCsrfToken('status/post'),
		));
	}
}
