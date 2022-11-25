# Documentazione diagramma ER
###### Relazioni tra entità
- **Users** (_attr_: UserName):
  1. **UsersData**: (uno-a-uno) Un utente può avere solo un record di dati collegati a se stesso (un solo nome, cognome, indirizzo, ...)
  2. **Supermercati**: (uno-a-molti) Un utente può aver l'accesso a più supermercati, ma un supermercato può avere solo un'admin
  3. **Carrello**: (uno-a-molti) Un utente può avere più carrelli associati, ed un carrello può essere associato ad un solo utente
- **Prodotti** (_attr_: IDProdotto):
  1. **prezzi-per-supermercato**: (uno-a-molti) Un prodotto, può essere presente in più supermercati
  2. **carrello**: (uno-a-molit) Un prodotto può essere associato a più carrelli
- **Supermercati** (_attr_: IDSupermercato):
  1. **prezzi-per-supermercato**: (uno-a-molti) Un prodotto è presente in più supermercati
