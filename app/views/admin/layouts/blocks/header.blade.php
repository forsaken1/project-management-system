{{
  Navbar::create(array(), Navbar::FIX_TOP)
      ->with_brand('Project Manager System :: Administrator', '/admin')
      ->with_menus(
        Navigation::links(
          array(
            array('Пользователи', '/admin/users', strstr(URL::current(), '/admin/users')),
            array('Проекты', '/admin/projects', strstr(URL::current(), '/admin/projects')),
          )
        )
      )
      ->with_menus(
        Navigation::links(
          array(
            array('Пользователь', '#', false, false,
              array(
                array('В систему', '/'),
                array('В личный кабинет', '/user'),
                array('Выйти', '/user/logout'),
              )
            )
          )
        ),
        array('class' => 'pull-right')
      );
}}