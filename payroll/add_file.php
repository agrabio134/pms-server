<style>
.search-box {
    width: 300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}

.search-box input[type="text"] {
    height: 32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
}

.result {
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
}

.search-box input[type="text"],
.result {
    width: 100%;
    box-sizing: border-box;
}

.result p {
    margin: 0;
    padding: 7px 10px;
    border: 1px solid #CCCCCC;
    border-top: none;
    cursor: pointer;
}

.result p:hover {
    background: #f2f2f2;
}

.search-box1 {
    width: 300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}

.search-box1 input[type="text"] {
    height: 32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
}

.result1 {
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
}

.search-box1 input[type="text"],
.result {
    width: 100%;
    box-sizing: border-box;
}

.result1 p {
    margin: 0;
    padding: 7px 10px;
    border: 1px solid #CCCCCC;
    border-top: none;
    cursor: pointer;
}

.result1 p:hover {
    background: #f2f2f2;
}
</style>
<script src="./jquery.js"></script>
<script>
$(document).ready(function() {
    $('.search-box input[type="text"]').on("keyup input", function() {
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
            $.get("backend-search.php", {
                term: inputVal
            }).done(function(data) {
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function() {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<script>
$(document).ready(function() {
    $('.search-box1 input[type="text"]').on("keyup input", function() {
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result1");
        if (inputVal.length) {
            $.get("backend-search.php", {
                num_term: inputVal
            }).done(function(data) {
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result1 p", function() {
        $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
        $(this).parent(".result1").empty();
    });
});
</script>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="main-container">
            <div class="slip-container">
                <div class="slip-item-container">
                    <div class="slip-item">
                        <Label>Employee Email:</Label>
                    </div>

                    <div class="slip-item">
                        <div class="search-box">
                            <!-- <input type="text" > -->
                            <input type="text" class="emp" name="email" autocomplete="off"
                                placeholder="Search Email Address..." />
                            <div class="result"></div>

                        </div>
                    </div>
                </div>

                <div class="slip-item-container">
                    <div class="slip-item">
                        <Label>Employee Number:</Label>
                    </div>
                    <div class="slip-item">
                        <div class="search-box1">

                            <input type="text" class="emp" name="emp_number" autocomplete="off"
                                placeholder="Re-Enter Email Address..." />
                            <div class="result1"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slip-container">
                <div class="slip-item-container">
                    <div class="slip-item">
                        <Label>Send payslip:</Label>
                    </div>
                    <div class="slip-item">
                        <input type="file" class="file-btn" name="file">
                    </div>

                </div>
                <div class="slip-item">
                    <input type="submit" class="sub-btn" name="submit" value="Upload">

                </div>
            </div>
        </div>
        </div>



    </form>
</body>


<style>
.main-container {
    display: grid;
    grid-template-columns: auto auto;
    padding: 10px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    width: 70%;
}

body {
    background-color: rgb(228, 228, 228);

}

.slip-item {

    margin: 2px;

}

.slip-container {
    display: grid;
    grid-row: auto auto;
}

.slip-item-container {

    display: flex;
}

.sub-btn {
    background-color: #555555;
    border: none;
    color: white;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

.sub-btn:hover {
    background-color: white;
    color: #555555;
}

.file-btn {
    background-color: #e7e7e7;
    color: black;
    border: none;
    padding: 2px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
}

.emp {
    width: 80%;
    height: 100%;
}
</style>