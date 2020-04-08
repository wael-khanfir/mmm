#include "transfert.h"
#include <QDebug>
#include "connexion.h"

Transfert::Transfert()
{
    id_client=0;
    id_dest=0;
    montant=0;
}

Transfert::Transfert(int id_client,int id_dest,int montant)
{
  this->id_client=id_client;
  this->id_dest=id_dest;
  this->montant=montant;
  //this->date=date;
}
int Transfert::get_id_client(){return id_client;}
int Transfert::get_id_dest(){return  id_dest;}
int Transfert::get_montant(){return  montant;}
//QDate Transfert::get_date(){return date;}


bool Transfert::ajouter()
{
QSqlQuery query;
QString res= QString::number(id_client);
query.prepare("INSERT INTO Transfert (ID_CLIENT, ID_DEST, MONTANT) "
                    "VALUES (:id_client, :id_dest, :montant)");
query.bindValue(":id_client", res);
query.bindValue(":id_dest", id_dest);
query.bindValue(":montant",montant);
//query.bindValue(":date",date);

return    query.exec();
}

QSqlQueryModel * Transfert::aficher()
{QSqlQueryModel * model= new QSqlQueryModel();
model->setQuery("select * from Transfert");
model->setHeaderData(0, Qt::Horizontal, QObject::tr("ID_client"));
model->setHeaderData(1, Qt::Horizontal, QObject::tr("id_dest"));
model->setHeaderData(2, Qt::Horizontal, QObject::tr("montant"));
//model->setHeaderData(3, Qt::Horizontal, QObject::tr("date"));
    return model;
}

bool Transfert::supprimer(int idd)
{
QSqlQuery query;
QString res= QString::number(idd);
query.prepare("Delete from Transfert where ID_CLIENT = :id_client ");
query.bindValue(":id_client", res);
return    query.exec();
}
bool Transfert::modifier(int idd,int id_dest,int montant)
{ QSqlQuery query;
    QString res= QString::number(idd);
    query.prepare("UPDATE Transfert SET ID_DEST=:id_dest,MONTANT=:montant where ID_CLIENT=:id_client");
    query.bindValue(":id_client",res);
    query.bindValue(":id_dest",id_dest);
    query.bindValue(":montant",montant);
    //query.bindValue(":date",date);
    return query.exec();

}
QSqlQueryModel *  Transfert::rechercher(int id_client)
{
    QSqlQueryModel * model=new QSqlQueryModel();
    QString res=QString::number(id_client);
    model->setQuery("select * from Transfert where (id_client LIKE '"+res+"%' ) ");


            return  model;


}
QSqlQueryModel * Transfert::trier_montant()
{
    QSqlQueryModel * model= new QSqlQueryModel();
    model->setQuery("select * from Transfert ORDER BY montant");
    model->setHeaderData(0, Qt::Horizontal, QObject::tr("id_client"));
    model->setHeaderData(3, Qt::Horizontal, QObject::tr("id_dest"));
    model->setHeaderData(4, Qt::Horizontal, QObject::tr("montant"));
    //model->setHeaderData(5, Qt::Horizontal, QObject::tr("date"));
        return model;
}
