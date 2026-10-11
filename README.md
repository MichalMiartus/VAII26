# VybavTo - webová aplikácia na správu úloh a projektov

Michal Miartuš

5ZYI31

## Stručný opis projektu
VybavTo je webová aplikácia na správu osobných a tímových úloh a projektov. Používateľ si môže vytvárať projekty, pridávať do nich úlohy, nastavovať ich prioritu, termín a stav. Pri tímových projektoch môže spolupracovať s ďalšími používateľmi a prideľovať im úlohy.

## Role v projekte
- **Návštevník** - registrácia a prihlásenie 
- **Používateľ** - vytváranie a správa vlastných projektov a úloh, prípadne spolupráca v tímových projektoch
- **Správca** - správa používateľských účtov

V tímových projektoch:
- **Owner** - spravuje projekt a členov a má všetky oprávnenia Editora
- **Editor** - upravuje úlohy
- **Viewer** - projekt iba prezerá

## Prípady použitia podľa rolí
### Návštevník
- zobrazí úvodnú stránku
- zaregistruje sa
- prihlási sa

### Používateľ
- vytvorí osobný alebo tímový projekt
- spravuje úlohy vo vlastných projektoch a podľa svojich oprávnení v tímových projektoch
- vyhľadáva a filtruje úlohy
- pridá prílohu k úlohe
- spravuje svoj profil

### Owner projektu
- má všetky oprávnenia Editora
- upravuje a odstraňuje projekt
- pozýva a odoberá členov
- prideľuje role
- priraďuje úlohy členom tímu

### Editor projektu
- vytvára a upravuje úlohy
- mení stav úloh
- priraďuje úlohy členom projektu

### Viewer projektu
- zobrazí projekt
- zobrazí úlohy projektu

### Správca
- spravuje používateľské účty

## Plánované entity
### User
Reprezentuje používateľa aplikácie.

Najdôležitejšie atribúty:
- id
- meno
- email
- heslo
- systémová rola
- profilový obrázok

### Project
Reprezentuje osobný alebo tímový projekt.

Najdôležitejšie atribúty:
- id
- názov
- popis
- typ projektu
- dátum vytvorenia
- vlastník projektu

### ProjectMember
Reprezentuje členstvo používateľa v tímovom projekte a jeho oprávnenia.

Najdôležitejšie atribúty:
- id používateľa
- id projektu
- projektová rola

### Task
Reprezentuje konkrétnu úlohu patriacu do projektu.

Najdôležitejšie atribúty:
- id
- názov
- popis
- stav
- priorita
- termín dokončenia
- dátum vytvorenia
- priradený používateľ
- projekt

Stavy úlohy môžu byť napríklad:
- TODO
- IN PROGRESS
- DONE

### Tag
Reprezentuje označenie, pomocou ktorého je možné úlohy kategorizovať a filtrovať.

Najdôležitejšie atribúty:
- id
- názov

### TaskTag
Prepojovacia entita medzi úlohami a tagmi.

Najdôležitejšie atribúty:
- id úlohy
- id tagu

### Attachment
Reprezentuje súbor priložený k úlohe.

Najdôležitejšie atribúty:
- id
- názov súboru
- cesta k súboru
- typ súboru
- dátum nahrania
- úloha

## Vzťahy medzi entitami
- **User - Project:** používateľ môže vlastniť viacero projektov, jeden projekt má jedného vlastníka - vzťah 1:N
- **User - Project cez ProjectMember:** používateľ môže byť členom viacerých tímových projektov a projekt môže obsahovať viacerých používateľov - vzťah M:N
- **Project - Task:** jeden projekt môže obsahovať viacero úloh, každá úloha patrí jednému projektu - vzťah 1:N
- **User - Task:** používateľovi môže byť pridelených viacero úloh, jedna úloha môže byť pridelená najviac jednému používateľovi - vzťah 1:N
- **Task - Tag cez TaskTag:** jedna úloha môže mať viacero tagov a jeden tag môže byť použitý pri viacerých úlohách - vzťah M:N
- **Task - Attachment:** jedna úloha môže obsahovať viacero príloh - vzťah 1:N

## Hlavné stránky aplikácie
### 1. Dashboard
Úvodná stránka po prihlásení. Zobrazuje najbližšie termíny, úlohy používateľa a základný prehľad jeho projektov.

### 2. Projekty
Zobrazuje všetky osobné a tímové projekty používateľa. Umožňuje vytvorenie nového projektu.

### 3. Detail projektu
Zobrazuje úlohy konkrétneho projektu a umožňuje ich filtrovanie a správu.

### 4. Detail úlohy
Zobrazuje kompletné informácie o úlohe. Umožňuje meniť stav, prioritu, termín, priradeného používateľa, tagy a prílohy.

### 5. Moje úlohy
Zobrazuje úlohy priradené aktuálne prihlásenému používateľovi naprieč všetkými projektmi.

### 6. Profil používateľa
Umožňuje používateľovi upravovať svoje osobné údaje a profilový obrázok.

### 7. Administrácia
Stránka dostupná iba správcovi aplikácie. Slúži na správu používateľských účtov.

## Rozdelenie funkcionality
### Základné funkcie
- registrácia a prihlásenie používateľa
- odhlásenie používateľa
- správa používateľského profilu
- vytváranie osobných projektov
- vytváranie tímových projektov
- CRUD operácie nad projektmi
- CRUD operácie nad úlohami
- nastavovanie stavu, priority a termínu úlohy
- priraďovanie úloh používateľom
- správa členov tímového projektu
- projektové role Owner, Editor a Viewer
- systémové role Používateľ a Správca
- serverová kontrola oprávnení
- používanie tagov
- nahrávanie a správa príloh
- vyhľadávanie a filtrovanie úloh
- AJAX zmena stavu úlohy bez obnovenia stránky
- AJAX filtrovanie úloh bez obnovenia stránky
- responzívne používateľské rozhranie
- administrácia používateľských účtov

### Rozširujúce funkcie
- Kanban nástenka s drag and drop presúvaním úloh
- kalendárové zobrazenie úloh
- integrácia s Google Calendar API na pridávanie úloh s termínom do kalendára používateľa
- upozornenia na blížiace sa termíny pomocou Notifications API
- štatistiky dokončených a nedokončených úloh
- história aktivít v tímovom projekte
- komentáre k úlohám
- tmavý režim aplikácie
- pokročilé filtrovanie úloh podľa projektu, používateľa, priority, stavu a termínu