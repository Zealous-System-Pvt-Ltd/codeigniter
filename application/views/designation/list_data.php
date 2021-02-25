<?php
$no = 1;
foreach ($designationData as $designation) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $designation->designation_name; ?></td>
        <td class="text-center">
            <button class="btn btn-warning update-designation" data-id="<?php echo $designation->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
            <button class="btn btn-danger delete-confirm-designation" data-id="<?php echo $designation->id; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
        </td>
    </tr>
    <?php
    $no++;
}
?>