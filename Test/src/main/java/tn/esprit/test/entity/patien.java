package tn.esprit.test.entity;

import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;

import java.io.Serializable;
import java.util.Date;
import java.util.Set;

@Entity
@Table(name ="patien")
@Getter
@Setter
public class patien implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "idp")
    private Long idp ;
    private  String nomp;
    private Long tel;
    @Temporal(TemporalType.DATE)
    private Date daten;
    @OneToMany(cascade = CascadeType.ALL,mappedBy = "patien")
    private Set<rendezvous> rendezvous;

}
