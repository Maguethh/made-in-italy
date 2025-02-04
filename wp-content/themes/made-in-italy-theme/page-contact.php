<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="contact-content">
    <h1>Contactez-nous</h1>
    <p>Vous pouvez nous joindre via le formulaire ci-dessous :</p>

    <!-- Exemple simple de formulaire de contact -->
    <form action="#" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

<?php get_footer(); ?>
