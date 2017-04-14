

CREATE TABLE `tasks` ( `id` INTEGER PRIMARY KEY AUTOINCREMENT, `name` varchar(100) NOT NULL, `status` int(1) NOT NULL, `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP )