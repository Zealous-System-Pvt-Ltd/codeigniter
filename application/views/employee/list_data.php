<?php
foreach ($employeeData as $employee) {
    ?>
    <tr>
        <td style="min-width:230px;"><?php echo $employee->emp_name; ?></td>
        <td><?php echo $employee->mobile_number; ?></td>
        <td><?php echo $employee->gender; ?></td>
        <td><?php echo $employee->designation_name; ?></td>
        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-employee" data-id="<?php echo $employee->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
            <button class="btn btn-danger confirm-delete-employee" data-id="<?php echo $employee->id; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
        </td>
    </tr>
    <?php
}
?>