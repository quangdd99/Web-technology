<?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $birthday = '17/04/1999';
        $birthday =DateTime::createFromFormat('d/m/Y', $birthday)->format('Y-m-d');
        
        //tính khoảng cách giữa hai ngày
        $diff = date_diff(date_create(), date_create($birthday));//c1
        $diff02 = date_create()->diff( date_create($birthday) );//c2
        
        $age = $diff->format('%Y');//tính tuổi
        $day = $diff->format('%a');//tính số ngày lệch
        $day = $diff->format($diff02->days);//tính số ngày lệch
                        //Thêm %r vào trc để có dấu - (âm)
                        //Thêm %R vào trc để có dấu + (dương)
        // echo $age;
        echo $day;
        

        //dễ sai định dạng ngày vì strtotime() 
        // $time = strtotime($birthday);
        // $new = date('d-m-Y', $time);

        //dung cách này
        // $ymd = DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');
        // $ymd = DateTime::createFromFormat('m/d/Y', $birthday)->format('Y-m-d');
        // echo $ymd;


        $birthday2 = '21/10/1995';
        $cvtDate = DateTime::createFromFormat('d/m/Y', $birthday2)->format('Y-m-d');
        $time2 = strtotime($cvtDate);
        echo $time2;
        // $newDate = date('Y-m-d H:i:s', $time2);
        // $time = new \DateTime();
        // echo $time;

        print_r(getdate());
    ?>