<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Mes documents administratifs</h2>
    <?php if (!empty($upload_success)): ?>
        <div class="w3-panel w3-green w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($upload_success) ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data" class="w3-card-4 w3-padding">
        <label>Pièce d'identité (PDF/JPG/PNG)</label>
        <input type="file" name="piece_identite" accept=".pdf,.jpg,.jpeg,.png" class="w3-input w3-margin-bottom">
        <label>Diplômes (PDF/JPG/PNG)</label>
        <input type="file" name="diplomes" accept=".pdf,.jpg,.jpeg,.png" class="w3-input w3-margin-bottom">
        <label>Photo d'identité (JPG/PNG)</label>
        <input type="file" name="photo_identite" accept=".jpg,.jpeg,.png" class="w3-input w3-margin-bottom">
        <label>Justificatif de domicile (PDF/JPG/PNG)</label>
        <input type="file" name="justificatif_domicile" accept=".pdf,.jpg,.jpeg,.png" class="w3-input w3-margin-bottom">
        <button class="w3-button w3-blue">Téléverser</button>
    </form>
    <hr>
    <h4>Documents déjà envoyés</h4>
    <ul class="w3-ul">
        <?php if (!empty($documents)): foreach ($documents as $doc): ?>
            <li><?= htmlspecialchars($doc['type_document']) ?> : <a href="<?= htmlspecialchars($doc['chemin']) ?>" target="_blank">Voir</a></li>
        <?php endforeach; else: ?>
            <li>Aucun document envoyé.</li>
        <?php endif; ?>
    </ul>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
