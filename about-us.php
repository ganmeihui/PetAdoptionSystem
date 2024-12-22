<?php $page = 'about-us';include('include/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CUSTOM STYLESHEET -->
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <style>

        html, body{
            max-width: 100%;
            overflow-x: hidden;
        }

        .container{
            text-align: justify;
            line-height: 1.6;
            width: 62.5vw;
            margin: auto;
        }

        .spacing{
            height: 50px;
        }

        @media (max-width: 1280px) {
            .container{
            width: 93.75vw;
        }
        }

        @media (max-width: 900px) {
            .container{
            padding:10px;
        }

        .spacing{
            height: 30px;
        }
        }
    </style>
    <link rel="stylesheet" href="common.css">
</head>
<body>
        <div class="container">
        <h1>About Us</h1>
        The Society for the Prevention of Cruelty to Animals, Kota Kinabalu (SPCA KK) is a non govermental organisation which has been registered
        with the Registry of Societies, Malaysia since the 14th February 2006. A group of animal lovers who had been working independently for the welfare of strays and abused
        animals in Kota Kinabalu had decided to form a common platform so that their work can be done more effectively.
        The purpose of the society is to promote a better understanding on the needs, and
        rights of animals in order to reduce the incidences of animal abuses.
        <br/>
        <br/>
        To date, the main effort of SPCA KK has been on educating the public on responsible pet ownership, inspectorate, rescue and rehoming after vaccination and desexing.
        The rescued animals which included puppies and kittens are currently being cared for in a temporary shelter, which sadly, has shifted three times between 2012 and 2015 for lack of a proper venue.
        <br/>
        <br/>
        We have recently been given a 4.5 acres piece of land in the district of Papar by a generous benefactor to construct a rehabilitation and adoption centre.
        The plans for the construction of the centre has been approved by the district council on the 7 Sept 2015 and we are now in the process of raising funds to begin construction.
        <br/>
        <br/>
        The society's work has so far been supported solely by donations from the general public. The successful completion of this centre will depend on further support from caring members in the community. Donations either in cash or in kind will be very helpful.
        <div class="spacing">
        </div>
        </div>    
</body>
<?php include('include/footer.php'); ?>
</html>


