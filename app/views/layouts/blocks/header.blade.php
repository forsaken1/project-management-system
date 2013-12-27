{{
  Navbar::create(array(), Navbar::FIX_TOP)
      ->with_brand('Project Manager System', '/')
      ->with_menus(
        Navigation::links(
          array(
            array('Проекты', '/projects', strstr(URL::current(), '/projects')),
            array('Стадии', '/stages', strstr(URL::current(), '/stages')),
            array('Задачи', '/tasks', strstr(URL::current(), '/tasks')),
            array('Отчеты', '/reports', strstr(URL::current(), '/reports')),
            array('Статистика', '/statistics', strstr(URL::current(), '/statistics')),
            array('Диаграмма Ганта', '/gantt', strstr(URL::current(), '/gantt')),
          )
        )
      )
      ->with_menus(
        Navigation::links(
          array(
            array('Пользователь', '#', false, false,
              array(
                array('В панель управления', '/admin'),
                array('В личный кабинет', '/user'),
                array('Выйти', '/user/logout'),
              )
            )
          )
        ),
        array('class' => 'pull-right')
      );
}}