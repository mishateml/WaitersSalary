<?php $this->layout('template', ['title' => 'sgira']) ?>


<div class="container mt-5 ">
    <div class="row justify-content-center"><h1>
            נא להכניס פרטים
        </h1></div>
        <div class="row justify-content-center align-self-center ">
            <form class="form-group " method="post" action="/sgira">
                <div class="input-group justify-content-end ">
                    <select class="custom-select" name="name" required >
                        <option selected >שם מלצר</option>
                        <?php foreach ($names as $name):?>
                            <option class="dropdown-item" value="<?php echo $name ?>" >
                                <?php echo $name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select class="custom-select" name="when" required>
                        <option selected>משמרת </option>
                        <option class="dropdown-item" > 1  </option>
                        <option class="dropdown-item" > 2  </option>
                    </select>
                    <input type="text" name="cash" placeholder="מזומן" class="form-control col-md-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="text" name="creditCard" placeholder="אשראי" class="form-control col-md-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="time" name="hours" placeholder="שעות" class="form-control col-md-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <div class="input-group-append mt-2 justify-content-end">
                    <button class="btn btn-secondary " name="submit" value="1" type="submit">הבא</button>
                    <a class="btn btn-secondary ml-1 " href="/test" >סיים</a>
                </div>
            </form>
        </div>
</div>
