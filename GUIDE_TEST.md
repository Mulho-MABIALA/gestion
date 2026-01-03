# Guide de Test de l'Application

## 🌐 Accès à l'application

**URL** : http://127.0.0.1:8000

Le serveur est déjà lancé et accessible !

---

## ✅ Tests à effectuer

### 1. 🏠 **Page d'accueil**

1. Ouvrez http://127.0.0.1:8000
2. Vérifiez :
   - ✅ Hero section avec titre et boutons
   - ✅ Les 4 prestations s'affichent
   - ✅ Section "Pourquoi nous choisir"
   - ✅ Footer avec vos informations
   - ✅ Menu de navigation fonctionne

### 2. 📋 **Pages publiques**

Testez chaque page du menu :
- ✅ `/prestations` - Liste complète des prestations
- ✅ `/qui-sommes-nous` - À propos
- ✅ `/contact` - Formulaire de contact
- ✅ `/faq` - Questions fréquentes
- ✅ `/politique-confidentialite` - Politique
- ✅ `/conditions-generales` - CGU

### 3. 👨‍💼 **Test Administrateur**

#### Connexion Admin
1. Cliquez sur "Connexion" dans le menu
2. Identifiants :
   - **Email** : `admin@gestion.com`
   - **Password** : `password`
3. Cliquez sur "Se connecter"

#### Dashboard Admin
Vous devriez voir :
- ✅ Statistiques (Total demandes, Clients, En cours)
- ✅ Répartition par statut (Rouge, Violet, Bleu, Vert)
- ✅ Menu latéral avec navigation

#### Créer un client
1. Menu : **Clients** → **+ Créer un utilisateur**
2. Remplissez le formulaire :
   - Nom : Test Client
   - Email : client@test.com
   - Téléphone : 0123456789
   - Mot de passe : password
   - Rôle : Client
3. Cliquez sur "Créer l'utilisateur"
4. ✅ Vérifiez qu'il apparaît dans la liste

### 4. 👤 **Test Client - Création de demande**

#### Déconnexion
1. Cliquez sur "Déconnexion" (dans le menu admin)

#### Créer une demande
1. Page d'accueil → Cliquez sur une prestation (ex: "Développement de sites web")
2. Cliquez sur "Faire une demande"
3. Remplissez le formulaire :
   - **Nom** : Jean Dupont
   - **Email** : jean.dupont@test.com
   - **Téléphone** : 0612345678
   - **Entreprise** : Test Company
   - **Mot de passe** : password123
   - **Confirmer** : password123
   - **Description** : Je souhaite un site e-commerce pour vendre mes produits
   - **Fonctionnalités** : Paiement en ligne, gestion de stock, espace client
   - **Budget** : 5000
   - **Délai** : 3 mois
4. (Optionnel) Joindre un fichier PDF ou image
5. Cliquez sur "Envoyer ma demande"

#### Vérifications
- ✅ Le compte est créé automatiquement
- ✅ Vous êtes connecté automatiquement
- ✅ Redirection vers l'espace client
- ✅ La demande apparaît avec le statut 🔴 Rouge "Demande envoyée"

### 5. 🎯 **Test du workflow complet**

#### En tant qu'Admin
1. Connectez-vous en admin : `admin@gestion.com` / `password`
2. Allez dans **Demandes**
3. Cliquez sur la demande de Jean Dupont
4. Testez :
   - ✅ Changer le statut : Rouge → Violet → Bleu → Vert
   - ✅ Ajouter un montant de facture : 4500
   - ✅ Cliquer sur "Envoyer la facture"
   - ✅ Ajouter des notes internes
   - ✅ Vérifier les fichiers joints (si uploadés)

#### En tant que Client
1. Déconnectez-vous
2. Connectez-vous avec : `jean.dupont@test.com` / `password123`
3. Vérifiez :
   - ✅ Dashboard avec statistiques
   - ✅ La demande s'affiche avec le nouveau statut
   - ✅ Le montant de la facture est visible
   - ✅ Cliquez sur "Voir les détails"
   - ✅ Vérifiez le suivi visuel des statuts (cercles colorés)

### 6. 🎨 **Test du design**

Vérifiez les couleurs du cahier des charges :
- ✅ Bleu principal #2563EB (boutons, liens)
- ✅ Gris foncé #1F2937 (textes, sidebar admin)
- ✅ Design responsive (réduisez la fenêtre)
- ✅ Footer avec vos informations

### 7. 🔒 **Test de sécurité**

Testez les restrictions d'accès :

1. Déconnectez-vous
2. Essayez d'accéder directement à :
   - http://127.0.0.1:8000/admin/dashboard
   - ✅ Devrait afficher "403 - Accès non autorisé"

3. Connectez-vous en client : `jean.dupont@test.com`
4. Essayez d'accéder à :
   - http://127.0.0.1:8000/admin/dashboard
   - ✅ Devrait afficher "403 - Accès non autorisé"

5. Connectez-vous en admin
6. Essayez d'accéder à :
   - http://127.0.0.1:8000/client/dashboard
   - ✅ Devrait afficher "403 - Accès non autorisé"

---

## 📊 Résumé des statuts

| Couleur | Emoji | Signification |
|---------|-------|---------------|
| 🔴 Rouge | Rouge | Demande envoyée |
| 🟣 Violet | Violet | Demande reçue |
| 🔵 Bleu | Bleu | En cours de traitement |
| 🟢 Vert | Vert | Terminée, prête pour livraison |

---

## 🎊 Checklist finale

- [ ] Page d'accueil fonctionne
- [ ] Toutes les pages publiques accessibles
- [ ] Connexion admin fonctionne
- [ ] Dashboard admin s'affiche
- [ ] Création de client fonctionne
- [ ] Création de demande fonctionne
- [ ] Compte client créé automatiquement
- [ ] Dashboard client s'affiche
- [ ] Changement de statut fonctionne
- [ ] Envoi de facture fonctionne
- [ ] Restrictions d'accès fonctionnent
- [ ] Design conforme (couleurs #2563EB et #1F2937)
- [ ] Footer avec vos informations
- [ ] Upload de fichiers fonctionne

---

## 🚀 Tout fonctionne ?

Si tous les tests passent, votre application est **prête pour la production** !

Prochaine étape : Déploiement sur byet.host (voir README_INSTALLATION.md)
