<div style="margin-top: 20px">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($params as $key => $student): ?>
            <tr>
                <td><?=$student['id']?></td>
                <td><?=$student['full_name']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>