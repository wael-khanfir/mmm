#ifndef TRANSFERT_H
#define TRANSFERT_H
#include <QString>
#include <QSqlQuery>
#include <QSqlQueryModel>
#include <QDate>

class Transfert
{
public:
    Transfert();

    Transfert(int,int,int);
    int get_id_client();
    int get_id_dest();
    int get_montant();
    //QDate get_date();
    bool ajouter();
    QSqlQueryModel * aficher();
    bool supprimer(int);
    bool modifier(int,int,int);
     QSqlQueryModel * rechercher(int);
      QSqlQueryModel * trier_montant();
private:
    int id_client,id_dest,montant;
    //QDate date;

};

#endif // TRANSFERT_H
