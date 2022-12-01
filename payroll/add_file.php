<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="main-container">
    <div class="slip-item">
    <Label>Employee Number:</Label>
    </div>
    <div class="slip-item">
    <input type="text" class="emp" name="emp_number">
    </div>
    <div class="slip-item">
    <Label>Recipient Email:</Label>
    </div>
    <div class="slip-item">
    <input type="text" class="emp" name="email">
    </div>
    <div class="slip-item">
    <Label>Send payslip:</Label>
    </div>
    <div class="slip-item">
    <input type="file" class="file-btn" name="file">
    </div>
    <div class="slip-item">
    <input type="submit" class="sub-btn" name="submit" value="Upload">

    </div>
</div>



</form>



<style>
    .main-container{
    display: grid;
    grid-template-columns: auto auto ; 
    /* border: 1px solid black; */
    padding: 10px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    width: 500px;
    }
    .slip-item{
    /* border: 1px solid red; */
    margin: 2px;
    }
    .sub-btn{
        background-color: #555555;
        border: none;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .sub-btn:hover{
        background-color: white;
        color: #555555;
    }
    .file-btn{
        background-color: #e7e7e7; 
        color: black;
        border: none;
        padding: 2px  4px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
    }
    .emp{
        width: 80%;
        height: 100%;
    }
</style>