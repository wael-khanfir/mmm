#include "facture.h"
#include <QDebug>
#include "connexion.h"
//ouyouy
Facture::Facture()
{
id=0;
type="";
prix=0;
}
Facture::Facture(int id,QString type,int prix)
{
  this->id=id;
  this->type=type;
  this->prix=prix;
}
QString Facture::get_type(){return  type;}
int Facture::get_prix(){return prix;}
int Facture::get_id(){return  id;}

bool Facture::ajouter()
{
QSqlQuery query;
QString res= QString::number(id);
query.prepare("INSERT INTO Facture (ID, TYPE, PRIX) "
                    "VALUES (:id, :type, :prix)");
query.bindValue(":id", res);
query.bindValue(":type", type);
query.bindValue(":prix", prix);

return    query.exec();
}

QSqlQueryModel * Facture::afficher()
{QSqlQueryModel * model= new QSqlQueryModel();
model->setQuery("select * from Facture");
model->setHeaderData(0, Qt::Horizontal, QObject::tr("ID"));
model->setHeaderData(1, Qt::Horizontal, QObject::tr("type "));
model->setHeaderData(2, Qt::Horizontal, QObject::tr("prix"));
    return model;
}

bool Facture::supprimer(int idd)
{
QSqlQuery query;
QString res= QString::number(idd);
query.prepare("Delete from Facture where ID = :id ");
query.bindValue(":id", res);
return    query.exec();
}
bool Facture::modifier(int idd,QString type,int prix)
{ QSqlQuery query;
    QString res= QString::number(idd);
    query.prepare("UPDATE Facture SET TYPE=:type,PRIX=:prix where ID=:id");
    query.bindValue(":id",res);
    query.bindValue(":type",type);
    query.bindValue(":prix",prix);
    return query.exec();

}
QSqlQueryModel *  Facture::rechercher(int id)
{
    QSqlQueryModel * model=new QSqlQueryModel();
    QString res=QString::number(id);
    model->setQuery("select * from Facture where (id LIKE '"+res+"%' ) ");


            return  model;


}
QSqlQueryModel * Facture::trier_prix()
{
    QSqlQueryModel * model= new QSqlQueryModel();
    model->setQuery("select * from Facture ORDER BY prix");
    model->setHeaderData(0, Qt::Horizontal, QObject::tr("id"));
    model->setHeaderData(3, Qt::Horizontal, QObject::tr("type "));
    model->setHeaderData(4, Qt::Horizontal, QObject::tr("prix"));
        return model;
}
