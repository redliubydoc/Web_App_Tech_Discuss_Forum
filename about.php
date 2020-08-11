<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Tech_Discuss - Codeing Forums</title>
  </head>
  <body>
    <?php require "./partials/_dbConnect.php";?>
    <?php require "./partials/_header.php";?>
    <div class="conain" style="min-height:800px;">
      <h1 class="display-4 text-center font-weight-bold my-3">Tech_Discuss Forum</h1>
      <h6 class=" my-4 text-capitalize text-muted text-center">This is a peer to peer forum created for fun</h6>
      <div class="container-fluid bg-dark text-light py-5">
        <h3 class="text-center text-danger">Forum Rules</h3>
        <ol class="py-4">
          <li>
            No Spam / Advertising / Self-promote in the forums
            These forums define spam as unsolicited advertisement for goods, services and/or other web sites, or posts with little, or completely unrelated content. Do not spam the forums with links to your site or product, or try to self-promote your website, business or forums etc.
            Spamming also includes sending private messages to a large number of different users.
            <br>
            DO NOT ASK for email addresses or phone numbers
            <br>
            Your account will be banned permanently and your posts will be deleted.
          </li>
          <br>
          <li>
            Do not post copyright-infringing material
            Providing or asking for information on how to illegally obtain copyrighted materials is forbidden.
          </li>
          <br>
          <li>
            Do not post “offensive” posts, links or images
            Any material which constitutes defamation, harassment, or abuse is strictly prohibited. Material that is sexually or otherwise obscene, racist, or otherwise overly discriminatory is not permitted on these forums. This includes user pictures. Use common sense while posting.
            This is a web site for accountancy professionals.
          </li>
          <br>
          <li>
            Do not cross post questions
            Please refrain from posting the same question in several forums. There is normally one forum which is most suitable in which to post your question.
          </li>
          <br>
          <li>
            Do not PM users asking for help
            Do not send private messages to any users asking for help. If you need help, make a new thread in the appropriate forum then the whole community can help and benefit.
          </li>
          <br>
          <li>
            Remain respectful of other members at all times
            All posts should be professional and courteous. You have every right to disagree with your fellow community members and explain your perspective.
          </li>
        </ol>
      </div>
    </div>
    <?php require "./partials/_footer.html";?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>