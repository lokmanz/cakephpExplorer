<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<?php 
echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); 
?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <!--
    print_r($posts) output:

    Array
    (
        [0] => Array
            (
                [Post] => Array
                    (
                        [id] => 1
                        [title] => The title
                        [body] => This is the post body.
                        [created] => 2008-02-13 18:34:55
                        [modified] =>
                    )
            )
        [1] => Array
            (
                [Post] => Array
                    (
                        [id] => 2
                        [title] => A title once again
                        [body] => And the post body follows.
                        [created] => 2008-02-13 18:34:56
                        [modified] =>
                    )
            )
        [2] => Array
            (
                [Post] => Array
                    (
                        [id] => 3
                        [title] => Title strikes back
                        [body] => This is really exciting! Not.
                        [created] => 2008-02-13 18:34:57
                        [modified] =>
                    )
            )
    )
    -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
            //link(string $title, mixed $url = null, array $options = array(), string $confirmMessage = false)
            ?>
            <?php 
                //<a href="/cakephpExplorer/posts/view/1">The title</a>
                echo $this->Html->link(
                                            $post['Post']['title'],
                                            array(
                                                    'controller' => 'posts', 
                                                    'action' => 'view', 
                                                    $post['Post']['id']
                                                  )
                                          ); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

    <?php unset($post); ?>
</table>