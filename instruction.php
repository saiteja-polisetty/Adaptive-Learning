<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <center><h1>Instructions for the Test:</h1><br></center>
        <center><pre>
            <p style="font-size:25px">This quiz contains 5 questions.</p>
            <p style="font-size:25px">The marks per each questions varies based on the level of the question.</p>
            <p style="font-size:25px">Gradually the difficulty increases.</p>
            <p style="font-size:25px">The marks given by the quiz judge are final</p>
            <button type="button" class="btn btn-success" onclick="myfunc()">Start Attempt</button>
        </pre></center>
        <script>
                        function myfunc()
                        {
                            location.replace("quiz.php")
                        }
                    </script>
        
    </body>
</html>