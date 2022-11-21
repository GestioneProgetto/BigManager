# Documentazione diagramma ER
## Analisi
###### Elenco entità e attributi:


- **Users**: Entità per gestire gli utenti
  - **UserName**: Chiave primaria
  - **Password**: Password dell'utente
  - **Mail**: indirizzo mail associato all'tente
- **UsersData**: Entità per gestire i dati dei singoli utenti
  - **UserName**: Chiave primaria 
  - **Nome**: Nome utente
  - **Cognome**: Cognome utente
  - **DataNascita**: Data di nascita dell'utente
  - **Indirizzo**: Indirizzo di residenza dell'utente
  - **Città**: Comune di residenza dell'utente
  - **Provincia**: Provincia di residenza dell'utente
- **Supermercati**:
  - **IDSupermercato**: Chiave primaria
  - **Nome**: Nome supermercato
  - **Indirizzo**: Indirizzo del supermercato
  - **Città**: Città del supermercato
  - **Titolare**: Nome e Cognome del titolare del supermercato (o carica massima all'interno di essso)
  - **AdminUser**: UserName dell'utente autorizzato a gestire il supermercato
- **Prodotti**:
  - **IDProdotto**: Chiave primaria
  - **Nome**: Nome del prodotto
  - **Marca**: Marca del prodotto
  - **Peso**: Peso del prodotto
  - **Tipo**: Tipo di prodotto (carne, pesce, dolce, ...)
- **Prezzi-per-supermercato**:
  - **ID**: Chiave primaria
  - **IDProdotto**: ID del prodotto
  - **IDSUpermercato**: ID del supermercato
  - **Prezzo**: Prezzo del prodotto
- **Carrello**:
  - **IDCarrello**: chiave primaria
  - **UserName**: Username utente a cui è associato il carrello
  - **IDProdotto**: Prodotto aggiunto al carrello
  - **Quantità**: Quantità dello stesso prodotto

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

###### Diagramma ER
![Schema diagramma ER](Diagramma%20E_R.png)