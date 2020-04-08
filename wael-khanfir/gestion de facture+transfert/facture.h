#ifndef FACTURE_H
#define FACTURE_H
#include <QString>
#include <QSqlQuery>
#include <QSqlQueryModel>
class Facture
{public:
    Facture();
    Facture(int,QString,int);
    QString get_type();
    int get_id();
    int get_prix();
    bool ajouter();
    QSqlQueryModel * afficher();
    bool supprimer(int);
    bool modifier(int,QString,int);
     QSqlQueryModel * rechercher(int);
      QSqlQueryModel * trier_prix();
private:
    QString type;
    int id,prix;

};

#endif // FACTURE_H
