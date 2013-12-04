{{
  Navbar::create(array(), Navbar::FIX_TOP)
      ->with_brand('Project Manager System', '/')
      ->with_menus(
        Navigation::links(
          array(
            array('Проекты', '/admin/projects', strstr(URL::current(), '/admin/projects')),
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