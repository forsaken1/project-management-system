{{
  Navbar::create(array(), Navbar::FIX_TOP)
      ->with_brand('Project Manager System :: Administrator', '/admin')
      ->with_menus(
        Navigation::links(
          array(
            array('Projects', '/admin/projects', strstr(URL::current(), '/admin/projects')),
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