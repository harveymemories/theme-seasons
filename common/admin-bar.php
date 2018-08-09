<style>
.fa {
    padding: 5px;
    font-size: 30px;
    width: 40px;
    text-align: right;
    text-decoration: none;
    border-radius: 50%;
}
</style>

<div style="float:left; display: block; padding:0px; margin-left:10px;">
     <a href="https://twitter.com/HarveyMemories" class="fa fa-twitter"></a>
     <a href="https://www.facebook.com/harveymemoriesproject/" class="fa fa-facebook"></a>
</div>

<nav id="admin-bar">

<?php if ($user = current_user()) {
    $links = array(
        array(
            'label' => __('Welcome, %s', $user->name),
            'uri' => admin_url('/users/edit/'.$user->id)
        ),
        array(
            'label' => __('Omeka Admin'),
            'uri' => admin_url('/')
        ),
        array(
            'label' => __('Log Out'),
            'uri' => url('/users/logout')
        )
    );
} else {
    $links = array();
}

echo nav($links, 'public_navigation_admin_bar');
?>

</nav>
