#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "facture.h"
#include <QMessageBox>
MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
ui->setupUi(this);

ui->tabfacture->setModel(tmpfacture.afficher());
ui->tabtransfert->setModel(tmptransfert.aficher());

}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_pb_supprimer_clicked()
{
int id = ui->lineEdit_id_2->text().toInt();
bool test=tmpfacture.supprimer(id);
if(test)
{ui->tabfacture->setModel(tmpfacture.afficher());//refresh
    QMessageBox::information(nullptr, QObject::tr("Supprimer une facture"),
                QObject::tr("facture supprimé.\n"
                            "Click Cancel to exit."), QMessageBox::Cancel);

}
else
    QMessageBox::critical(nullptr, QObject::tr("Supprimer une facture"),
                QObject::tr("Erreur !.\n"
                            "Click Cancel to exit."), QMessageBox::Cancel);


}

void MainWindow::on_modifier_clicked()
{
    int id = ui->lineEdit_id->text().toInt();
      QString type= ui->lineEdit_type->text();
      int prix= ui->lineEdit_prix->text().toInt();
     Facture f;
     bool test=f.modifier(id,type,prix);
   if(test)
     {
        ui->tabfacture->setModel(tmpfacture.afficher());//refresh
        QMessageBox::information(nullptr, QObject::tr("Modifier une facture !"),
                          QObject::tr(" facture modifié ! \n"
                                      "Click Cancel to exit."), QMessageBox::Cancel);
     }

     else {

         QMessageBox::critical(nullptr, QObject::tr("Modifier une facture"),
                     QObject::tr("Erreur !.\n"
                                 "Click Cancel to exit."), QMessageBox::Cancel);
     }
}

void MainWindow::on_pb_ajouter_clicked()
{
    int id = ui->lineEdit_id->text().toInt();
    QString type= ui->lineEdit_type->text();
    int prix= ui->lineEdit_prix->text().toInt();
  Facture f(id,type,prix);
  bool test=f.ajouter();
  if(test)
{

      ui->tabfacture->setModel(tmpfacture.afficher());//refresh
QMessageBox::information(nullptr, QObject::tr("Ajouter une Facture"),
                  QObject::tr("Facture ajouté.\n"
                              "Click Cancel to exit."), QMessageBox::Cancel);

}
  else
      QMessageBox::critical(nullptr, QObject::tr("Ajouter une facture "),
                  QObject::tr("Erreur !.\n"
                              "Click Cancel to exit."), QMessageBox::Cancel);


}


void MainWindow::on_pushButton_clicked()
{
    {
        int id = ui->lineEdit_id_2->text().toInt();
       ui->tabfacture->setModel(tmpfacture.rechercher(id));

    }
}

void MainWindow::on_pushButton_tri_clicked()
{
    bool test=true;
            if(test){

                   { ui->tabfacture->setModel(tmpfacture.trier_prix());
                    QMessageBox::information(nullptr, QObject::tr("trier facture"),
                                QObject::tr("factures trier.\n"
                                            "Voulez-vous enregistrer les modifications ?"),
                                       QMessageBox::Save
                                       | QMessageBox::Cancel,
                                      QMessageBox::Save);
    }

                }
                else
                    QMessageBox::critical(nullptr, QObject::tr("trier factures"),
                                QObject::tr("Erreur !.\n"
                                            "Click Cancel to exit."), QMessageBox::Cancel);

}

void MainWindow::on_pushButton_ajouter2_clicked()
{
    int id_client = ui->lineEdit_idclient->text().toInt();
   int id_dest= ui->lineEdit_iddest->text().toInt();
    int montant= ui->lineEdit_montant->text().toInt();
  Transfert t(id_client,id_dest,montant);
  bool test=t.ajouter();
  if(test)
{

      ui->tabtransfert->setModel(tmptransfert.aficher());//refresh
QMessageBox::information(nullptr, QObject::tr("Ajouter un Transfert"),
                  QObject::tr("Transfert ajouté.\n"
                              "Click Cancel to exit."), QMessageBox::Cancel);

}
  else
      QMessageBox::critical(nullptr, QObject::tr("Ajouter un Transfert "),
                  QObject::tr("Erreur !.\n"
                              "Click Cancel to exit."), QMessageBox::Cancel);


}


void MainWindow::on_pushButton_3_clicked()//modifier transfert
{
    int id_client = ui->lineEdit_idclient->text().toInt();
      int id_dest= ui->lineEdit_iddest->text().toInt();
      int montant= ui->lineEdit_montant->text().toInt();
     Transfert t;
     bool test=t.modifier(id_client,id_dest,montant);
   if(test)
     {
        ui->tabtransfert->setModel(tmptransfert.aficher());//refresh
        QMessageBox::information(nullptr, QObject::tr("Modifier un Transfert !"),
                          QObject::tr(" Transfert modifié ! \n"
                                      "Click Cancel to exit."), QMessageBox::Cancel);
     }

     else {

         QMessageBox::critical(nullptr, QObject::tr("Modifier un Transfert"),
                     QObject::tr("Erreur !.\n"
                                 "Click Cancel to exit."), QMessageBox::Cancel);
     }
}



void MainWindow::on_pushButton_4_clicked()//tri transfert
{
    bool test=true;
            if(test){

                   { ui->tabtransfert->setModel(tmptransfert.trier_montant());
                    QMessageBox::information(nullptr, QObject::tr("trier Transfert"),
                                QObject::tr("Transferts trier.\n"
                                            "Voulez-vous enregistrer les modifications ?"),
                                       QMessageBox::Save
                                       | QMessageBox::Cancel,
                                      QMessageBox::Save);
    }

                }
                else
                    QMessageBox::critical(nullptr, QObject::tr("trier Transferts"),
                                QObject::tr("Erreur !.\n"
                                            "Click Cancel to exit."), QMessageBox::Cancel);
}

void MainWindow::on_supprimer_transfert_clicked()
{
    int id_client = ui->lineEdit_metier->text().toInt();
    bool test=tmptransfert.supprimer(id_client);
    if(test)
    {ui->tabtransfert->setModel(tmptransfert.aficher());//refresh
        QMessageBox::information(nullptr, QObject::tr("Supprimer un Transfert"),
                    QObject::tr("facture supprimé.\n"
                                "Click Cancel to exit."), QMessageBox::Cancel);

    }
    else
        QMessageBox::critical(nullptr, QObject::tr("Supprimer un Transfert"),
                    QObject::tr("Erreur !.\n"
                                "Click Cancel to exit."), QMessageBox::Cancel);
}

void MainWindow::on_pushButton_6_clicked()//recherche transfert
{
    {
        int id_client = ui->lineEdit_metier->text().toInt();
       ui->tabtransfert->setModel(tmptransfert.rechercher(id_client));

    }
}
