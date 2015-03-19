<?php 

	//User Class
	class user {
		private $UserId,$UserName,$UserMail,$UserPassword;

		public function getUserId() {
			return $this->UserId;
		}

		public function setUserId($UserId) {
			$this->UserId=$UserId;
		}

		public function getUserName() {
			return $this->UserName;
		}

		public function setUserName($UserName) {
			$this->UserName=$UserName;
		}

		public function getUserMail() {
			return $this->UserMail;
		}

		public function setUserMail($UserMail) {
			$this->UserMail=$UserMail;
		}

		public function getUserPassword() {
			return $this->UserPassword;
		}

		public function setUserPassword($UserPassword) {
			$this->UserPassword=$UserPassword;
		}

		//Inserts the user into the table.
		public function InsertUser() {
			include "conn.php";
			mysqli_query($bdd,"INSERT INTO users(UserName,UserMail,UserPassword) VALUES('$_POST[UserName]','$_POST[UserMail]','$_POST[UserPassword]')");

			function UserLogin() {
				include "conn.php";
				$check = mysqli_query($bdd,"SELECT * FROM users WHERE UserMail='$UserMail' AND UserPassword='$UserPassword'");

				if($check->rowCount()==0) {
					header("Location: ../../index.php?error=1");
				} else {
					while($data=$check->fetch()) {
						$this->setUserId($data['UserId']);
						$this->setUserName($data['UserName']);
						$this->setUserMail($data['UserMail']);
						$this->setUserPassword($data['UserPassword']);
						header("Location: Home.php");
					}
				}
			}

			/*while($row=mysqli_fetch_array($req,MYSQLI_BOTH)) {
				$UserName = $row['UserName'];
				$UserMail = $row['UserMail'];
				$UserPassword = $row['UserPassword'];
			}*/

			/*while($row=mysqli_fetch_array($req,MYSQLI_BOTH)) {
				$row['UserName'] = $this->getUserName();
				$row['UserMail'] = $this->getUserMail();
				$row['UserPassword'] = $this->getUserPassword();
			}*/

			/*$req->execute(array(
				'UserName' => $this->getUserName(),
				'UserMail' => $this->getUserMail(),
				'UserPassword' => $this->getUserPassword()
			));*/
		}
	}

	//Chat Class
	class chat {
		private $ChatId,$ChatUserId,$ChatText;

		public function getChatId() {
			return $this->ChatId;
		}

		public function setChatId() {
			$this->ChatId = $ChatId;
		}

		public function getChatUserId() {
			return $this->ChatUserId;
		}

		public function setChatUserId() {
			$this->ChatUserId = $ChatUserId;
		}

		public function getChatText() {
			return $this->ChatText;
		}

		public function setChatText() {
			$this->ChatText = $ChatText;
		}

		//Inserts the chat into the table
		public function InsertChatMessage() {
			include "conn.php";
			mysqli_query($bdd,"INSERT INTO chats(ChatUserId,ChatText) VALUES('$_POST[ChatUserId]','$_POST[ChatText]')");

			/*while($row=mysqli_fetch_array($req,MYSQLI_BOTH)) {
				$row['ChatUserId'] = $this->getChatUserId();
				$row['ChatText'] = $this->getChatText();
			}*/

			/*$req->execute(array(
				'ChatUserId' => $this->getChatUserId(),
				'ChatText' => $this->getChatText()
			));*/
		}
	}

 ?>