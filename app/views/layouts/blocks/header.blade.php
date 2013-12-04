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
          )
        )
      )
      ->with_menus(
        Navigation::links(
          array(
            array('Выйти', '/user/logout'),
          )
        ),
        array('class' => 'pull-right')
      );
}}